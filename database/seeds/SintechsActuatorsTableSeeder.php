<?php

use App\SintechsModules;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsActuatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arduino_module = SintechsModules::where('name', 'arduino_board#1')->first();
        if (! $arduino_module)
            throw new Exception('Command MODULE arduino_sensors1 not found... Cannot seed COMMAND_IO');
            
        
        DB::table('sintechs_actuators')->insert([
            'id' => '1',
            'uuid' => 'solenoid#1',
            'type' => 'Solenoid',
            'description' => 'Solenoid 12V for Refreshing and Cooling the ambient',
            'model' => 'XXXXX',
            'active' => true,
            'module_id' => $arduino_module->id
        ]);
    }
}
