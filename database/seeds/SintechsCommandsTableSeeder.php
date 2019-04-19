<?php

use App\SintechsCommandTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsCommandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cmd_type = SintechsCommandTypes::where('name', 'IO_COMMAND')->first();
        if (! $cmd_type)
            throw new Exception('Command TYPE IO_COMMAND not found... Cannot seed COMMAND_IO');

        $arduino_module = SintechsCommandTypes::where('name', 'arduino_sensors1')->first();
        if (! $cmd_type)
            throw new Exception('Command MODULE arduino_sensors1 not found... Cannot seed COMMAND_IO');
            
            
        DB::table('sintechs_commands')->insert([
            'id' => 1,
            'type_id' => $cmd_type->id,
            'module_id' => $arduino_module->id,
            'serialCommand' => 'SET_IO',
            'enabled' => true,
            'description' => 'Send Commands to/from IO Ports.'
        ]);
        
        
        $cmd_type = SintechsCommandTypes::where('name', 'GET_STATUS')->first();
        if (! $cmd_type)
            throw new Exception('Command TYPE GET_STATUS not found... Cannot seed COMMAND');
        
        DB::table('sintechs_commands')->insert([
            'id' => 1,
            'type_id' => $cmd_type->id,
            'module_id' => $arduino_module->id,
            'serialCommand' => 'GET_IO',
            'enabled' => true,
            'description' => 'Send Commands to/from IO Ports.'
        ]);
        
    }
}