<?php

namespace App;
use Exception;
class Vger4BCPmap
{
    
    
    /**
     * COMMANDS CAN GO FROM 				0xFFFF[0]001 to 0xFFFF[0]FFF
     * COMMANDS ARGS CAN GO FROM 			0xFFFF[F]001 to 0xFFFF[F]FFF
     * DEVICES SENSORS CAN GO FROM 			0xFFFF[1]001 to 0xFFFF[1]FFF
     * DEVICES CTUATORS CAN GO FROM 		0xFFFF[2]001 to 0xFFFF[2]FFF
     * MODULES ID CAN GO FROM		 		0xFFFF[3]001 to 0xFFFF[3]FFF
     */

    protected static $map = array(
        'MODULE_COMMMAND_FLAG' => 0xFFFF0001, // control byte to advice a command is comming
        'MODULE_COMMMAND_ARGS_FLAG' => 0xFFFF0002, // control byte to advice a argument array is comming
        'MODULE_COMMMAND_EXECUTE_FLAG' => 0xFFFF0013, // control byte to advice command to execute

        'MODULE_COMMMAND_GET_STATE' => 0xFFFF0020,
        'MODULE_COMMMAND_GET_DATA' => 0xFFFF0021,
        'MODULE_COMMAND_GET_PROCESS_FLOW' => 0xFFFF0022,

        'MODULE_COMMMAND_SET_ACTUATOR' => 0xFFFF0801,
        'MODULE_COMMMAND_SET_ARGS1' => 0xFFFFF001,
        'MODULE_COMMMAND_SET_ARGS2' => 0xFFFFF002,
        'MODULE_COMMMAND_SET_ARGS3' => 0xFFFFF003,
        'MODULE_COMMMAND_SET_ARGS4' => 0xFFFFF004,
        'MODULE_COMMMAND_SET_ARGS5' => 0xFFFFF005,
        'MODULE_COMMMAND_SET_ARGS6' => 0xFFFFF006,
        'MODULE_COMMMAND_SET_ARGS7' => 0xFFFFF007,
        'MODULE_COMMMAND_SET_ARGS8' => 0xFFFFF008,

        'MODULE_SENSOR_DTH21_1_1' => 0xFFFF1001,
        'MODULE_SENSOR_DTH21_1_2' => 0xFFFF1002,
        'MODULE_SENSOR_DTH21_1_3' => 0xFFFF1003,
        'MODULE_SESNSOR_BME280_1_1' => 0xFFFF1005,
        'MODULE_SESNSOR_BME280_1_2' => 0xFFFF1006,
        
        'MODULE_ACTUATOR_DN20_1_1' => 0xFFFF2001,
        'MODULE_ACTUATOR_DN20_1_2' => 0xFFFF2002,
        'MODULE_ACTUATOR_DN20_1_3' => 0xFFFF2003,
        'MODULE_ACTUATOR_DN20_1_4' => 0xFFFF2004,
        
        'MODULE_AVR_CLIMATIZATION_1' => 0xFFFF3001,
        'MODULE_AVR_CLIMATIZATION_2' => 0xFFFF3002,
        'MODULE_AVR_CLIMATIZATION_3' => 0xFFFF3003,
        'MODULE_AVR_SOIL_1' => 0xFFFF3011,
    );

    static public function get4BCPValueByModuleConstName($const_name)
    {
        if (array_key_exists($const_name, self::$map))
            return self::$map[$const_name];
        else
            throw new Exception("4BCP CONSTANT_NAME not found: $const_name");
    }

    // TODO: uint
    // static public function get4BCPModuleConstNameByValue($const_name){
    // if(array_key_exists($const_name, self::$map))
    // return self::$map[$const_name];
    // else
    // throw new Exception("4BCP CONSTANT_NAME not found: $const_name");
    // }
}

?>
