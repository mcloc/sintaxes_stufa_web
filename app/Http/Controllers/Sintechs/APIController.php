<?php
namespace App\Http\Controllers\Sintechs;

use App\SintechsActuators;
use App\SintechsAlerts;
use App\SintechsModules;
use App\SintechsRules;
use App\SintechsRulesActuatorEvents;
use App\SintechsRulesFired;
use App\SintechsSampling;
use App\SintechsSamplingActuators;
use App\SintechsSamplingSensors;
use App\SintechsSensors;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Socket\Raw\Factory;
use Exception;


class APIController extends Controller {
    
    public function __construct()
    {
        $this->middleware('api');
    }
    
    
    public function testSockets(){
        $factory = new Factory();
        $socket = $factory->createClient('tcp://localhost:1932');
        
        $data = '{"commandMethod":"wrtitePort", "commandArgs":[{"LED#1":"true"}]}';
        
        
        $socket->write($data);
        $socket->write("\u0004");
//         $data = $socket->read(8192);
        
        
        $socket->close();
        die($data);
    }
    
    
    public function getSampling($sampling_id){
        
        if($sampling_id == null){
            return new JsonResponse(array('error' => 'no sampling_id'), 200);
        }
        
        $sampling = SintechsSampling::with(array('module', 'samplingSensors', 'samplingActuators', 'samplingSensors.sensor','samplingActuators.actuator'))->find($sampling_id);
        if($sampling == null){
            return new JsonResponse(array('error' => 'sampling_id no found'), 200);
        }
        $json = json_encode($sampling);
        
        return new JsonResponse(json_decode($json), 200);
    }
    
    public function getLastSensorEvent($sensor_uuid){
        
        $event = SintechsRulesActuatorEvents::orderByDesc('created_at')->with(array('ruleFired'))->where("sensor.uuid", $sensor_uuid)->first();
        if($event == null){
            return new JsonResponse(array('error' => '$event no found for sensor_uuid:'.$sensor_uuid), 200);
        }
        $json = json_encode($event);
        
        return new JsonResponse(json_decode($json), 200);
    }
    
    public function getModuleId($module_name){
        $module_name = urldecode($module_name);
        $module = SintechsModules::where("name", $module_name)->first();
        if($module == null){
            return new JsonResponse(array('error' => 'module no found for module_name:'.$module_name), 200);
        }
        $status = array(
            'data' => array(
                'module_id' => $module->id,
            ),
            'status' => 'OK',
            'error_code' => null,
            'error_msg' => null,
        );
        return new JsonResponse($status, 200);
    }
    
    public function getSensorId($sensor_uuid){
        $sensor_uuid = urldecode($sensor_uuid);
        $sensor = SintechsSensors::where("uuid", $sensor_uuid)->first();
        if($sensor == null){
            return new JsonResponse(array('error' => 'sensor no found for uuid:'.$sensor_uuid), 200);
        }
        $status = array(
            'data' => array(
                'sensor_id' => $sensor->id,
            ),
            'status' => 'OK',
            'error_code' => null,
            'error_msg' => null,
        );
        return new JsonResponse($status, 200);
    }
    
    public function getSensorByUUID($sensor_uuid){
        $sensor_uuid = urldecode($sensor_uuid);
        $sensor = SintechsSensors::where("uuid", $sensor_uuid)->first();
        if($sensor == null){
            return new JsonResponse(array('error' => 'sensor no found for uuid:'.$sensor_uuid), 200);
        }
        $status = array(
            'data' => array(
                'id' => $sensor->id,
                'uuid' => $sensor->uuid,
                'type' => $sensor->type,
                'description' => $sensor->description,
                'model' => $sensor->model,
                'active' => $sensor->active,
                'module_id' => $sensor->module_id,
                'created_at' => $sensor->created_at,
                'updated_at' => $sensor->updated_at,
                
            ),
            'status' => 'OK',
            'error_code' => null,
            'error_msg' => null,
        );
        return new JsonResponse($status, 200);
    }
    
    public function getActuatorByUUID($actuator_uuid){
        $actuator_uuid = urldecode($actuator_uuid);
        $actuator = SintechsSensors::where("uuid", $actuator_uuid)->first();
        if($actuator == null){
            return new JsonResponse(array('error' => 'actuator no found for uuid:'.$actuator_uuid), 200);
        }
        $status = array(
            'data' => array(
                'id' => $actuator->id,
                'uuid' => $actuator->uuid,
                'type' => $actuator->type,
                'description' => $actuator->description,
                'model' => $actuator->model,
                'active' => $actuator->active,
                'module_id' => $actuator->module_id,
                'created_at' => $actuator->created_at,
                'updated_at' => $actuator->updated_at,
                
            ),
            'status' => 'OK',
            'error_code' => null,
            'error_msg' => null,
        );
        return new JsonResponse($status, 200);
    }
    
    
    /**
     * 
     * @param Request  $json_data_arr
     * @return $json_object
     * 
     * JsonData should be like this example
     * 
        {
            "module_name": "arduino_board#1",
            "data": {
                "sensors": [ {
        			"uuid": "DHT11#1",
                    "value": [
                    	{"humidity": 66.5},
                        {"temperature": 28.7},
                        {"heat_index": 32.5234}
                    ]
        		}]
                ,
                "actuators": [ {
                    "uuid": "solenoid#1",
                    "value": {"active": "true","activated_time": 15}
                }]
            },
            "status": "OK",
            "uptime": 12,
            "error_code": null,
            "error_msg": null
        }
     * 
     * 
     */
    public function storeSampling(Request $request){
        $data = $request->all();
        
        try {
            $this->checkData($data);
        } catch (Exception $e){
            return new JsonResponse(array('error' => $e->getMessage()), 200);
        }
        
        $module = SintechsModules::where('name', $data['module_name'])->first();

        $last_actuators_state = array();
        $last_sampling = SintechsSampling::orderByDesc('created_at')->first();
        if($last_sampling != null){
            $last_actuators = SintechsSamplingActuators::where('sampling_id', $last_sampling->id)->get();
            foreach($last_actuators as $last_act){
                $last_actuators_state[$last_act->actuator_id] = (bool) filter_var($last_act->active);
            }
        }
        
        
        $sampling = new SintechsSampling();
        $sampling->module_id = $module->id;
        $sampling->status = $data['status'];
        $sampling->uptime = $data['uptime'];
        $sampling->error_code = $data['error_code'];
        $sampling->error_msg = $data['error_msg'];
        $sampling->save();
        
        
        
        foreach($data['data']['sensors'] as $sensor_arr){
            
            $sensor = SintechsSensors::where('uuid', $sensor_arr['uuid'])->first();
            foreach($sensor_arr['value'] as $values) {
                foreach($values as $key_value => $value){
                    $sampling_sensor = new SintechsSamplingSensors();
                    $sampling_sensor->sampling_id = $sampling->id;
                    $sampling_sensor->sensor_id = $sensor->id;
                    $sampling_sensor->measure_type = $key_value;
                    $sampling_sensor->value = $value;
                    $sampling_sensor->save();
                }
            }
        }
        
        foreach($data['data']['actuators'] as $actuator_arr){
            $actuator = SintechsActuators::where('uuid', $actuator_arr['uuid'])->first();
            $sampling_actuator = new SintechsSamplingActuators();
            $sampling_actuator->sampling_id = $sampling->id;
            $sampling_actuator->actuator_id = $actuator->id;
            $sampling_actuator->active = (bool) filter_var($actuator_arr['value']['active'], FILTER_VALIDATE_BOOLEAN);
            $sampling_actuator->activated_time = $actuator_arr['value']['activated_time'];
            $sampling_actuator->save();
            
            if(array_key_exists($actuator->id, $last_actuators_state)){
                if($last_actuators_state[$actuator->id] != $sampling_actuator->active){
                    $alert = new SintechsAlerts();
                    $alert->readed = false;
                    $alert->module_id = $module->id;
                    $alert->message = Carbon::parse($sampling->created_at)->format('d/m/Y H:i:s') .
                        ": O estado do atuador: " .$actuator_arr['uuid']." modou para: ".$actuator_arr['value']['active'];
                    $alert->created_by = "Armazenamento de Amostragem";
                    $alert->save();
                }
            }
        }
        
        
        $status = array(
            'data' => array(
                'sampling_id' => $sampling->id,
            ),
            'status' => 'OK',
            'error_code' => null,
            'error_msg' => null,
        );
//         $status = json_encode($status);
        
//         return new JsonResponse($data, 200);
        return new JsonResponse($status, 201);
    }
    
 
    private function checkData($data){
        if(!$data || $data == null || ! is_array($data)){
            throw new Exception('no data posted');
        }
        
        if(!array_key_exists('status', $data) || !array_key_exists('data', $data) || !is_array($data['data']) ){
            throw new Exception('malformed json');
        }
        
        if($data['status'] != 'OK'){
            //TODO: Log ERROR
            throw new Exception('status not OK');
        }
        
        if(!array_key_exists('sensors', $data['data']) || !array_key_exists('actuators', $data['data'])){
            //TODO: Log ERROR
            throw new Exception('no data on sensors or actuators');
        }
        
        $module = SintechsModules::where('name', $data['module_name'])->first();
        
        if(!$module || $module == null){
            //TODO: Log ERROR
            throw new Exception('status not OK');
        }
        foreach($data['data']['sensors'] as $sensor_arr){
            $sensor = SintechsSensors::where('uuid', $sensor_arr['uuid'])->first();
            if(!$sensor || $sensor == null){
                //TODO: Log ERROR
                throw new JsonResponse('sensor '.$sensor_arr['uuid'].' not exists');
            }
        }
       
        foreach($data['data']['actuators'] as $actuator_arr){
            $actuator = SintechsActuators::where('uuid', $actuator_arr['uuid'])->first();
            if(!$actuator || $actuator == null){
                //TODO: Log ERROR
                throw new Exception('actuator '.$actuator_arr['uuid'].' not exists');
            }
        }
    }
    
    public function storeRuleEvent(Request $request){
        $data = $request->all();
        
        try {
            $this->checkRuleData($data);
        } catch (Exception $e){
            return new JsonResponse(array('error' => $e->getMessage()), 200);
        }
        
        $module = SintechsModules::where('name', $data['module_name'])->first();
        $rule = SintechsRules::where('name', $data['rule_name'])->first();
        
        $rule_fired = new SintechsRulesFired();
        $rule_fired->rule_id = $rule->id;
        $rule_fired->value = $data['value'];
        $rule_fired->rule_condition = $data['rule_condition'];
        $rule_fired->sampling_id = $data['sampling_id'];
        $rule_fired->sampling_sensor_id = $data['sampling_sensor_id'];
        $rule_fired->cause_description = $data['cause_description'];
        $rule_fired->sensor_uuid = $data['sensor_uuid'];
        $rule_fired->save();
        
        $event = new SintechsRulesActuatorEvents();
        $event->rule_fired_id = $rule_fired->id;
        $event->actuator_uuid = $data['actuator_uuid'];
        $event->value = $data['command_value'];
        $event->duration_time = $data['duration_time'];
        $event->cause_description = $data['cause_description'];
        $event->event_finished = $data['event_finished'];
        $event->save();
        
        
        $status = array(
            'data' => array(
                'event_id' => $event->id,
            ),
            'status' => 'OK',
            'error_code' => null,
            'error_msg' => null,
        );

        return new JsonResponse($status, 201);
    }
    
    public function checkRuleData($data){
        if(!$data || $data == null || ! is_array($data)){
            throw new Exception('no data posted');
        }
        
        if(!array_key_exists('status', $data) || !array_key_exists('data', $data) || !is_array($data['data']) ){
            throw new Exception('malformed json');
        }
        
        if($data['status'] != 'OK'){
            //TODO: Log ERROR
            throw new Exception('status not OK');
        }
        
        return true;
    }
}