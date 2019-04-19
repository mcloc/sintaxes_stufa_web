<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\SintechsModules;


class APIController extends Controller {
    
    public function __construct()
    {
        $this->middleware('api');
    }
    
    
    /**
     * 
     * @param unknown $json_data
     * @return unknown
     * 
     * JsonData should be like this example
     * 
     * {
     *      'module_name':'arduino_board1', 
     *      'data':[
     *          {'sensors':[
     *              {'uuid':'DHT11#1', 
     *               'value':[
     *                  {'humidity':67.4},
     *                  {'temperature':28.6}, 
     *                  {'heat_index': 32.434}
     *               ] 
     *              }
     *          ]},
     *          {'actuators:[
     *              {'uuid':'solenoid#1', 
     *               'value':[
     *                  {'status':'on'},
     *                  {'status_time': 15}
     *               ]
     *              }
     *          ]}'
     *     ]
     * } 
     * 
     * 
     */
    public function storeSampling(Request $request){
//         $example = array(
//             'module_name' => 'arduino_board#1',
//             'data' => array(
//                 'sensors' => array(
//                     'uuid' => 'DHT11#1',
//                     'value' => array(
//                         'humidity' => 66.5,
//                         'temperature' => 28.7,
//                         'heat_index' => 32.5234
//                     ),
//                 ),
//                 'actuators' => array(
//                     'uuid' => 'solenoid#1',
//                     'value' => array(
//                         'status' => 'on',
//                         'status_time' => 15,
//                     ),
//                 ),
//             ),
//             'status' => 'OK',
//             'uptime' => 12,
//             'error_code' => null,
//             'error_msg' => null,
//         );
//         $data = json_encode($example);
        
        $data = $request->all();
        
        if(!$data || $data == null || ! is_array($data)){
            return new JsonResponse(['error' => 'no data posted'], 200);
        }
        
        if(!array_key_exists('status', $data) || !array_key_exists('data', $data) || !is_array($data['data']) ){
            return new JsonResponse(['error' => 'malformed json', 'request' => $data], 200);
        }

        if($data['status'] != 'OK'){
            //TODO: Log ERROR
            return new JsonResponse(['error' => 'status not OK', 'request' => $data], 200);
        }
        
        if(!array_key_exists('sensors', $data['data']) || !array_key_exists('actuators', $data['data'])){
            //TODO: Log ERROR
            return new JsonResponse(['error' => 'status not OK', 'request' => $data], 200);
        }
        
        $module = SintechsModules::where('name', $data['module_name'])->get();
        
        if(!$module || $module == null){
            //TODO: Log ERROR
            return new JsonResponse(['error' => 'status not OK', 'request' => $data], 200);
        }
        
        
        
        $status = array(
            'data' => array(
                'sampling_id' => 1,
            ),
            'status' => 'OK',
            'error_code' => null,
            'error_msg' => null,
        );
        $status = json_encode($status);
        
//         return new JsonResponse($data, 200);
        return new JsonResponse($status, 201);
    }
    
    
}