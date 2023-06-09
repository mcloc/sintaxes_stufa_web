<?php
use App\VgerModules;
use App\Vger4BCP;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerSensorsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * ************************** INSIDE AIR CLIMATIZATION BOARDS SESNORS ***************************
         */

        /**
         * CLIMATIZATION BOARD #1
         */
        $AVR_module = VgerModules::where('name', 'AVR_climatization_board#1')->first();
        if (! $AVR_module)
            throw new Exception('Command MODULE AVR_climatization#1 not found... Cannot seed SENSORS');
      
        $_4BCP = Vger4BCP::where('uuid_4BCP', 0xFFFF1001)->first();
        if (! $_4BCP)
            throw new Exception('uuid_4BCP not found... Cannot seed SENSORS');
            
        DB::table('vger_sensors')->insert([
            'id' => '1',
            'uuid' => 'DHT21#1',
            'type' => 'Humidity and Temperature',
            'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#1)',
            'model' => 'DHT21',
            'active' => true,
            'enabled' => true,
            'module_id' => $AVR_module->id,
            'id_4BCP'   => $_4BCP->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        $_4BCP = Vger4BCP::where('uuid_4BCP', 0xFFFF1002)->first();
        if (! $_4BCP)
            throw new Exception('uuid_4BCP not found... Cannot seed SENSORS');
        
        DB::table('vger_sensors')->insert([
            'id' => '2',
            'uuid' => 'DHT21#2',
            'type' => 'Humidity and Temperature',
            'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#1)',
            'model' => 'DHT21',
            'active' => true,
            'enabled' => true,
            'module_id' => $AVR_module->id,
            'id_4BCP'   => $_4BCP->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        $_4BCP = Vger4BCP::where('uuid_4BCP', 0xFFFF1003)->first();
        if (! $_4BCP)
            throw new Exception('uuid_4BCP not found... Cannot seed SENSORS');
        
        DB::table('vger_sensors')->insert([
            'id' => '3',
            'uuid' => 'DHT21#3',
            'type' => 'Humidity and Temperature',
            'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#1)',
            'model' => 'DHT21',
            'active' => true,
            'enabled' => true,
            'module_id' => $AVR_module->id,
            'id_4BCP'   => $_4BCP->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        
        
        

        /**
         * CLIMATIZATION BOARD #2
         */
//         $AVR_module = VgerModules::where('name', 'AVR_climatization_board#2')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_climatization#1 not found... Cannot seed SENSORS');

//         DB::table('vger_sensors')->insert([
//             'id' => '4',
//             'uuid' => 'DHT21#4',
//             'type' => 'Humidity and Temperature',
//             'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#2)',
//             'model' => 'DHT21',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);
        
//         DB::table('vger_sensors')->insert([
//             'id' => '5',
//             'uuid' => 'DHT21#5',
//             'type' => 'Humidity and Temperature',
//             'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#2)',
//             'model' => 'DHT21',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);
        
//         DB::table('vger_sensors')->insert([
//             'id' => '6',
//             'uuid' => 'DHT21#6',
//             'type' => 'Humidity and Temperature',
//             'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#2)',
//             'model' => 'DHT21',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * CLIMATIZATION BOARD #3
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_climatization_board#3')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_climatization#1 not found... Cannot seed SENSORS');

//         DB::table('vger_sensors')->insert([
//             'id' => '7',
//             'uuid' => 'DHT21#7',
//             'type' => 'Humidity and Temperature',
//             'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#3)',
//             'model' => 'DHT21',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);
        
//         DB::table('vger_sensors')->insert([
//             'id' => '8',
//             'uuid' => 'DHT21#8',
//             'type' => 'Humidity and Temperature',
//             'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#3)',
//             'model' => 'DHT21',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);
        
//         DB::table('vger_sensors')->insert([
//             'id' => '9',
//             'uuid' => 'DHT21#9',
//             'type' => 'Humidity and Temperature',
//             'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_climatization_board#3)',
//             'model' => 'DHT21',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * ***************************************** SOIL BOARDS SENSORS ********************************************
//          */

//         /**
//          * SOIL BOARD #1
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_soil_board#1')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_climatization#1 not found... Cannot seed SENSORS');

//         DB::table('vger_sensors')->insert([
//             'id' => '10',
//             'uuid' => 'LM393#1',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#1)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '11',
//             'uuid' => 'Ds18b20#1',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#1)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '12',
//             'uuid' => 'LM393#2',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#1)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '13',
//             'uuid' => 'Ds18b20#2',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#1)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '14',
//             'uuid' => 'LM393#3',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#1)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '15',
//             'uuid' => 'Ds18b20#3',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#1)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * SOIL BOARD #2
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_soil_board#2')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_soil_board#2 not found... Cannot seed SENSORS');

//         DB::table('vger_sensors')->insert([
//             'id' => '16',
//             'uuid' => 'LM393#4',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#2)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '17',
//             'uuid' => 'Ds18b20#4',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#2)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '18',
//             'uuid' => 'LM393#5',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#2)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '19',
//             'uuid' => 'Ds18b20#5',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#2)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '20',
//             'uuid' => 'LM393#6',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#2)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '21',
//             'uuid' => 'Ds18b20#6',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#2)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * SOIL BOARD 3
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_soil_board#3')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_soil_board#3 not found... Cannot seed SENSORS');

//         DB::table('vger_sensors')->insert([
//             'id' => '22',
//             'uuid' => 'LM393#7',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '23',
//             'uuid' => 'Ds18b20#7',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '24',
//             'uuid' => 'LM393#8',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '25',
//             'uuid' => 'Ds18b20#8',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '26',
//             'uuid' => 'LM393#9',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '27',
//             'uuid' => 'Ds18b20#9',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * SOIL BOARD #4
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_soil_board#4')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_soil_board#4 not found... Cannot seed SENSORS');

//         DB::table('vger_sensors')->insert([
//             'id' => '28',
//             'uuid' => 'LM393#10',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#4)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '29',
//             'uuid' => 'Ds18b20#10',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '30',
//             'uuid' => 'LM393#11',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#4)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '31',
//             'uuid' => 'Ds18b20#11',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#3)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '32',
//             'uuid' => 'LM393#12',
//             'type' => 'Humidity Soil Sensor',
//             'description' => 'Humidity Soil Sensors, 3.3Volts, on Serial wire (AVR_soil_board#4)',
//             'model' => 'LM393',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         DB::table('vger_sensors')->insert([
//             'id' => '33',
//             'uuid' => 'Ds18b20#12',
//             'type' => 'Temperature Soil Sensor',
//             'description' => 'TEmperature Soil Sensors, 5Volts, on Serial wire (AVR_soil_board#4)',
//             'model' => 'Ds18b20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * ***************************************** EXTERNAL CLIMATIZATION BOARD SENSORS ********************************************
//          */

//         /**
//          * EXTERNAL CLIMATIZATION BOARD #1
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_external_climatization_board#1')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_external_climatization_board#1 not found... Cannot seed SENSORS');

//         DB::table('vger_sensors')->insert([
//             'id' => '34',
//             'uuid' => 'DHT21#1',
//             'type' => 'Humidity and Temperature',
//             'description' => 'Humidity and Temperature Sensors, 5Volts, on Serial wire (AVR_external_climatization_board#1)',
//             'model' => 'DHT21',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);
    }
}