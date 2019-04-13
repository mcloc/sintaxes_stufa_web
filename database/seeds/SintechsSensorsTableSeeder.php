<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsSensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sintechs_sensors')->insert([
            'id' => '1',
            'type' => 'Humidity and Temperature',
            'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire',
            'model' => 'DHT11',
            'active' => true,
        ]);
    }
}
