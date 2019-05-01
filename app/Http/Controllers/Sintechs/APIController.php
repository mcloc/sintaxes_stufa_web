<?php
namespace App\Http\Controllers\Sintechs;

use App\SintechsActuators;
use App\SintechsAlerts;
use App\SintechsModules;
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
            return new JsonResponse(['error' => $e->getMessage()], 200);
        }
        
        $module = SintechsModules::where('name', $data['module_name'])->first();

        
        $last_sampling = SintechsSampling::orderByDesc('created_at')->first();
        $last_actuators = SintechsSamplingActuators::where('sampling_id', $last_sampling->id)->get();
        $last_actuators_state = array();
        foreach($last_actuators as $last_act){
            $last_actuators_state[$last_act->actuator_id] = (bool) filter_var($last_act->active);
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
}