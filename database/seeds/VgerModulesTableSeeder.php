<?php

use App\VgerModulesType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $pi_board = VgerModulesType::where('name', 'pi_board')->first();
        if (! $pi_board)
            throw new Exception('Module Type "pi_board" not found... Cannot seed MODULES.');
     
        
        DB::table('vger_modules')->insert([
            'id' => 1,
            'name' => 'pi_master_server',
            'description' => 'PI Master Server',
            'active' => true,
            'enabled' => true,
            'type_id' => $pi_board->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        
        $software_type = VgerModulesType::where('name', 'software')->first();
        if (! $software_type)
            throw new Exception('Module Type "AVR" not found... Cannot seed MODULES.');
        
        DB::table('vger_modules')->insert([
            'id' => 3,
            'name' => 'tcp_communication',
            'description' => 'Java TCP 4BCProtocol Communication Handler',
            'active' => true,
            'enabled' => true,
            'type_id' => $software_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_modules')->insert([
            'id' => 4,
            'name' => 'rest_api',
            'description' => 'PHP RESTfull API',
            'active' => true,
            'enabled' => true,
            'type_id' => $software_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_modules')->insert([
            'id' => 5,
            'name' => 'web_app',
            'description' => 'PHP Control and DashBoard WEB APP',
            'active' => true,
            'enabled' => true,
            'type_id' => $software_type->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        
        /************ AVR boards **************
         * 
         */
        $AVR_type = VgerModulesType::where('name', 'AVR')->first();
        if (! $AVR_type)
            throw new Exception('Module Type "AVR" not found... Cannot seed MODULES.');
            
            DB::table('vger_modules')->insert([
                'id' => 6,
                'name' => 'AVR_climatization_board#1',
                'description' => 'Arduino Sensors and Actuators for climatization #1',
                'active' => true,
                'enabled' => true,'active' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            DB::table('vger_modules')->insert([
                'id' => 7,
                'name' => 'AVR_climatization_board#2',
                'description' => 'Arduino Sensors and Actuators for climatization #2',
                'active' => true,
                'enabled' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            DB::table('vger_modules')->insert([
                'id' => 8,
                'name' => 'AVR_climatization_board#3',
                'description' => 'Arduino Sensors and Actuators for climatization #3',
                'active' => true,
                'enabled' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            DB::table('vger_modules')->insert([
                'id' => 9,
                'name' => 'AVR_soil_board#1',
                'description' => 'Arduino Sensors and Actuators for Soil #1',
                'active' => true,
                'enabled' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            DB::table('vger_modules')->insert([
                'id' => 10,
                'name' => 'AVR_soil_board#2',
                'description' => 'Arduino Sensors and Actuators for soil #2',
                'active' => true,
                'enabled' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            DB::table('vger_modules')->insert([
                'id' => 11,
                'name' => 'AVR_soil_board#3',
                'description' => 'Arduino Sensors and Actuators for soil #3',
                'active' => true,
                'enabled' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            DB::table('vger_modules')->insert([
                'id' => 12,
                'name' => 'AVR_soil_board#4',
                'description' => 'Arduino Sensors and Actuators for soil #4',
                'active' => true,
                'enabled' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            
            DB::table('vger_modules')->insert([
                'id' => 13,
                'name' => 'AVR_external_climatization_board#1',
                'description' => 'Arduino Sensors and Actuators for external_climatization #1',
                'active' => true,
                'enabled' => true,
                'type_id' => $AVR_type->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
