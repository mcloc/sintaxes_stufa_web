<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsCommandsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sintechs_command_type')->insert([
            'id' => 1,
            'name' => 'IO_COMMAND',
            'return_type' => 'status',
            'description' => 'Send Commands to/from IO Ports.'
        ]);
        
        DB::table('sintechs_command_type')->insert([
            'id' => 2,
            'name' => 'ANALOG_COMMAND',
            'return_type' => 'status',
            'description' => 'Send Commands to/from ANALOG Ports.'
        ]);
        
        DB::table('sintechs_command_type')->insert([
            'id' => 3,
            'name' => 'GET_STATUS',
            'return_type' => 'value',
            'description' => 'Request for status on defined PORT'
        ]);
        
        DB::table('sintechs_command_type')->insert([
            'id' => 4,
            'name' => 'RESET_BOARD',
            'return_type' => 'status',
            'description' => 'Reset BOARD (no arguments)'
        ]);
        
        DB::table('sintechs_command_type')->insert([
            'id' => 5,
            'name' => 'DEBUG',
            'return_type' => 'status',
            'description' => 'Set Unset DEBUG for board'
        ]);
    }
}
