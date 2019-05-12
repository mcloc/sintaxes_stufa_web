<?php

use App\SintechsModules;
use Carbon\Carbon;
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
        $arduino_module = SintechsModules::where('name', 'arduino_board#1')->first();
        if (! $arduino_module)
            throw new Exception('Command MODULE arduino_board1 not found... Cannot seed COMMAND_IO');
            
        
        DB::table('sintechs_sensors')->insert([
            'id' => '1',
            'uuid' => 'DHT11#1',
            'type' => 'Humidity and Temperature',
            'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire',
            'model' => 'DHT11',
            'active' => true,
            'module_id' => $arduino_module->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
