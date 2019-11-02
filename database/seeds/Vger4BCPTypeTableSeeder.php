<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * COMMANDS CAN GO FROM 				0xFFFF[0]001 to 0xFFFF[0]FFF
 * COMMANDS ARGS CAN GO FROM 			0xFFFF[F]001 to 0xFFFF[F]FFF
 * DEVICES SENSORS CAN GO FROM 			0xFFFF[1]001 to 0xFFFF[1]FFF
 * DEVICES ACTUATORS CAN GO FROM 		0xFFFF[2]001 to 0xFFFF[2]FFF
 * MODULES ID CAN GO FROM		 		0xFFFF[3]001 to 0xFFFF[3]FFF
 * 4BCP FLAGS CAN GO FROM		 		0xFFFF[4]001 to 0xFFFF[4]FFF
 */



class Vger4BCPTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vger_4bcprotocol_types')->insert([
            'id' => 1,
            'start_range' =>    0xFFFF0001,
            'end_range' =>      0xFFFF0FFF,
            'type' => 'avr_commands',
            'description' => '4BCP AVR Commands',
            'active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol_types')->insert([
            'id' => 2,
            'start_range' =>    0xFFFFF001,
            'end_range' =>      0xFFFFFFFF,
            'type' => 'avr_commands_args',
            'description' => '4BCP AVR Commands Arguments',
            'active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol_types')->insert([
            'id' => 3,
            'start_range' =>    0xFFFF1001,
            'end_range' =>      0xFFFF1FFF,
            'type' => 'sensors_devices',
            'description' => 'Sensors Devices',
            'active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol_types')->insert([
            'id' => 4,
            'start_range' =>    0xFFFF2001,
            'end_range' =>      0xFFFF2FFF,
            'type' => 'actuators_devices',
            'description' => '4BCP Actuators Devices',
            'active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol_types')->insert([
            'id' => 5,
            'start_range' =>    0xFFFF3001,
            'end_range' =>      0xFFFF3FFF,
            'type' => 'avr_modules',
            'description' => '4BCP AVR Modules',
            'active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('vger_4bcprotocol_types')->insert([
            'id' => 6,
            'start_range' =>    0xFFFF4001,
            'end_range' =>      0xFFFF4FFF,
            'type' => 'flags',
            'description' => '4BCP Flags',
            'active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
