<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerCommandsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vger_commands_type')->insert([
            'id' => 1,
            'name' => 'IO_COMMAND',
            'return_type' => 'status',
            'description' => 'Send Commands to/from IO Ports.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_commands_type')->insert([
            'id' => 2,
            'name' => 'ANALOG_COMMAND',
            'return_type' => 'status',
            'description' => 'Send Commands to/from ANALOG Ports.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_commands_type')->insert([
            'id' => 3,
            'name' => 'GET_STATUS',
            'return_type' => 'value',
            'description' => 'Request for status on defined PORT',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_commands_type')->insert([
            'id' => 4,
            'name' => 'GET_DATA',
            'return_type' => 'value',
            'description' => 'Request for data on sensors,actuators',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_commands_type')->insert([
            'id' => 5,
            'name' => 'GET_INFO',
            'return_type' => 'value',
            'description' => 'Request for information on config (which sensors, actuators and other variables)',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_commands_type')->insert([
            'id' => 6,
            'name' => 'RESET_BOARD',
            'return_type' => 'status',
            'description' => 'Reset BOARD (no arguments)',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_commands_type')->insert([
            'id' => 7,
            'name' => 'DEBUG',
            'return_type' => 'status',
            'description' => 'Set Unset DEBUG for board',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
