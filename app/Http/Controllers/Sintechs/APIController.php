<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;


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
    public function storeSampling(){
        $example = array(
            'module_name' => 'arduino_board#1',
            'data' => array(
                'sensors' => array(
                    'uuid' => 'DHT11#1',
                    'value' => array(
                        'humidity' => 66.5,
                        'temperature' => 28.7,
                        'heat_index' => 32.5234
                    ),
                ),
                'actuators' => array(
                    'uuid' => 'solenoid#1',
                    'value' => array(
                        'status' => 'on',
                        'status_time' => 15,
                    ),
                ),
            ),
        );
        
        $data = json_encode($example);
        $data = json_decode($data, true);
        return new JsonResponse($data, 200);
        
        ////////////

    }
    
    
}