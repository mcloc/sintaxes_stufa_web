<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sintechs_types')->insert([
            'id' => '1',
            'name' => 'module',
            'description' => 'References to one of the arduino modules',
            'active' => true,
        ]);
        
        DB::table('sintechs_types')->insert([
            'id' => '2',
            'name' => 'sensors',
            'description' => 'References to sensors per si',
            'active' => true,
        ]);
        
        DB::table('sintechs_types')->insert([
            'id' => '3',
            'name' => 'actuators',
            'description' => 'References to actuators per si (solenoids, relays, etc)',
            'active' => true,
        ]);
        
        DB::table('sintechs_types')->insert([
            'id' => '3',
            'name' => 'sampling',
            'description' => 'References to Sampling Data from arduino boards',
            'active' => true,
        ]);
        
        DB::table('sintechs_types')->insert([
            'id' => '4',
            'name' => 'software',
            'description' => 'References to Software, JavaSerialComm, REST_API, WEB_APP',
            'active' => true,
        ]);
        
        DB::table('sintechs_types')->insert([
            'id' => '5',
            'name' => 'rules',
            'description' => 'References to one or more rules from Drools Expert System',
            'active' => true,
        ]);
        
        DB::table('sintechs_types')->insert([
            'id' => '6',
            'name' => 'config',
            'description' => 'References to one or more config variable',
            'active' => true,
        ]);
    }
}
