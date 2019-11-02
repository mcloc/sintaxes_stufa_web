<?php

use App\VgerModulesType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Vger4BCPType;

/**
 * COMMANDS CAN GO FROM 				0xFFFF[0]001 to 0xFFFF[0]FFF
 * COMMANDS ARGS CAN GO FROM 			0xFFFF[F]001 to 0xFFFF[F]FFF
 * DEVICES SENSORS CAN GO FROM 			0xFFFF[1]001 to 0xFFFF[1]FFF
 * DEVICES ACTUATORS CAN GO FROM 		0xFFFF[2]001 to 0xFFFF[2]FFF
 * MODULES ID CAN GO FROM		 		0xFFFF[3]001 to 0xFFFF[3]FFF
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
            'enabled' => true,
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
            'enabled' => true,
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
            'enabled' => true,
            'type_4BCP' => $_4BCP_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
