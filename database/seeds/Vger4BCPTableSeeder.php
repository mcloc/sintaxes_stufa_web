<?php
use App\Vger4BCPType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * COMMANDS CAN GO FROM 0xFFFF[0]001 to 0xFFFF[0]FFF
 * COMMANDS ARGS CAN GO FROM 0xFFFF[F]001 to 0xFFFF[F]FFF
 * DEVICES SENSORS CAN GO FROM 0xFFFF[1]001 to 0xFFFF[1]FFF
 * DEVICES ACTUATORS CAN GO FROM 0xFFFF[2]001 to 0xFFFF[2]FFF
 * MODULES ID CAN GO FROM 0xFFFF[3]001 to 0xFFFF[3]FFF
 */
class Vger4BCPTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_4BCP_type = Vger4BCPType::where('type', 'avr_commands')->first();
        if (! $_4BCP_type)
            throw new Exception('4BCP Type "avr_commands" not found... Cannot seed 4BCP Table.');

        DB::table('vger_4bcprotocol')->insert([
            'id' => 1,
            'uuid_4BCP' => 0xFFFF0020,
            'constant_name' => 'MODULE_COMMMAND_GET_STATE',
            'description' => 'AVR Command to get state of the module',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 2,
            'uuid_4BCP' => 0xFFFF0021,
            'constant_name' => 'MODULE_COMMMAND_GET_DATA',
            'description' => 'AVR Command to get the module data',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 3,
            'uuid_4BCP' => 0xFFFF0022,
            'constant_name' => 'MODULE_COMMAND_GET_PROCESS_FLOW',
            'description' => 'AVR Command to get process flow of the module',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 4,
            'uuid_4BCP' => 0xFFFF0801,
            'constant_name' => 'MODULE_COMMMAND_SET_ACTUATOR',
            'description' => 'AVR Command to set actuator of the module',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $_4BCP_type = Vger4BCPType::where('type', 'avr_commands_args')->first();
        if (! $_4BCP_type)
            throw new Exception('4BCP Type "avr_commands_args" not found... Cannot seed 4BCP Table.');

        DB::table('vger_4bcprotocol')->insert([
            'id' => 5,
            'uuid_4BCP' => 0xFFFFF001,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS1',
            'description' => 'AVR Command to set command argument 1',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 6,
            'uuid_4BCP' => 0xFFFFF002,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS2',
            'description' => 'AVR Command to set command argument 2',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 7,
            'uuid_4BCP' => 0xFFFFF003,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS3',
            'description' => 'AVR Command to set command argument 3',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 8,
            'uuid_4BCP' => 0xFFFFF004,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS4',
            'description' => 'AVR Command to set command argument 4',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 9,
            'uuid_4BCP' => 0xFFFFF005,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS5',
            'description' => 'AVR Command to set command argument 5',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 10,
            'uuid_4BCP' => 0xFFFFF006,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS6',
            'description' => 'AVR Command to set command argument 6',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 11,
            'uuid_4BCP' => 0xFFFFF007,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS7',
            'description' => 'AVR Command to set command argument 7',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 12,
            'uuid_4BCP' => 0xFFFFF008,
            'constant_name' => 'MODULE_COMMMAND_SET_ARGS8',
            'description' => 'AVR Command to set command argument 1',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $_4BCP_type = Vger4BCPType::where('type', 'sensors_devices')->first();
        if (! $_4BCP_type)
            throw new Exception('4BCP Type "sensors_devices" not found... Cannot seed 4BCP Table.');

        DB::table('vger_4bcprotocol')->insert([
            'id' => 13,
            'uuid_4BCP' => 0xFFFF1001,
            'constant_name' => 'MODULE_SENSOR_DTH21_1_1',
            'description' => 'AVR Module Sensor DTH21 module 1 - sensors 1',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 14,
            'uuid_4BCP' => 0xFFFF1002,
            'constant_name' => 'MODULE_SENSOR_DTH21_1_2',
            'description' => 'AVR Module Sensor DTH21 module 1 - sensors 2',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 15,
            'uuid_4BCP' => 0xFFFF1003,
            'constant_name' => 'MODULE_SENSOR_DTH21_1_3',
            'description' => 'AVR Module Sensor DTH21 module 1 - sensors 3',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $_4BCP_type = Vger4BCPType::where('type', 'actuators_devices')->first();
        if (! $_4BCP_type)
            throw new Exception('4BCP Type "actuators_devices" not found... Cannot seed 4BCP Table.');

        DB::table('vger_4bcprotocol')->insert([
            'id' => 16,
            'uuid_4BCP' => 0xFFFF2001,
            'constant_name' => 'MODULE_ACTUATOR_DN20_1_1',
            'description' => 'AVR Module Actuator  DN20 module 1 - actuator 1',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 17,
            'uuid_4BCP' => 0xFFFF2002,
            'constant_name' => 'MODULE_ACTUATOR_DN20_1_2',
            'description' => 'AVR Module Actuator  DN20 module 1 - actuator 2',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 18,
            'uuid_4BCP' => 0xFFFF2003,
            'constant_name' => 'MODULE_ACTUATOR_DN20_1_3',
            'description' => 'AVR Module Actuator  DN20 module 1 - actuator 3',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol')->insert([
            'id' => 19,
            'uuid_4BCP' => 0xFFFF2004,
            'constant_name' => 'MODULE_ACTUATOR_DN20_1_4',
            'description' => 'AVR Module Actuator  DN20 module 1 - actuator 4',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $_4BCP_type = Vger4BCPType::where('type', 'avr_modules')->first();
        if (! $_4BCP_type)
            throw new Exception('4BCP Type "avr_modules" not found... Cannot seed 4BCP Table.');

        DB::table('vger_4bcprotocol')->insert([
            'id' => 20,
            'uuid_4BCP' => 0xFFFF3001,
            'constant_name' => 'AVR-Sintaxes-module-1',
            'description' => 'AVR Module 1',
            'active' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);
                    
                
    }
}


