<?php

use App\SintechsModulesType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $pi_board = SintechsModulesType::where('name', 'pi_board')->first();
        if (! $pi_board)
            throw new Exception('Module Type "pi_board" not found... Cannot seed MODULES.');
     
        
        DB::table('sintechs_modules')->insert([
            'id' => 1,
            'name' => 'pi_master_server',
            'description' => 'PI Master Server',
            'enabled' => true,
            'type_id' => $pi_board->id,
        ]);
        
        
        $arduino_type = SintechsModulesType::where('name', 'arduino')->first();
        if (! $arduino_type)
            throw new Exception('Module Type "arduino" not found... Cannot seed MODULES.');

        DB::table('sintechs_modules')->insert([
            'id' => 2,
            'name' => 'arduino_sensors1',
            'description' => 'Arduino Sensors and Actuators #1',
            'enabled' => true,
            'type_id' => $arduino_type->id,
        ]);
           
        
        $software_type = SintechsModulesType::where('name', 'software')->first();
        if (! $software_type)
            throw new Exception('Module Type "arduino" not found... Cannot seed MODULES.');
        
        DB::table('sintechs_modules')->insert([
            'id' => 3,
            'name' => 'serial_communication',
            'description' => 'Java Serial Communication Handler',
            'enabled' => true,
            'type_id' => $software_type->id,
        ]);
        
        DB::table('sintechs_modules')->insert([
            'id' => 4,
            'name' => 'rest_api',
            'description' => 'PHP RESTfull API',
            'enabled' => true,
            'type_id' => $software_type->id,
        ]);
        
        DB::table('sintechs_modules')->insert([
            'id' => 5,
            'name' => 'web_app',
            'description' => 'PHP Control and DashBoard WEB APP',
            'enabled' => true,
            'type_id' => $software_type->id,
        ]);
    }
}
