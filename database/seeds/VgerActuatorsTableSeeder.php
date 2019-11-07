<?php
use App\Vger4BCP;
use App\VgerModules;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerActuatorsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ************************** INSIDE AIR CLIMATIZATION BOARDS ACTUATORS ***************************
         */

        /**
         * CLIMATIZATION BOARD #1
         */
        $AVR_module = VgerModules::where('name', 'AVR_climatization_board#1')->first();
        if (! $AVR_module)
            throw new Exception('Command MODULE AVR_climatization_board#1 not found... Cannot seed ACTUATORS');

        $_4BCP = Vger4BCP::where('uuid_4BCP', 0xFFFF2001)->first();
        if (! $_4BCP)
            throw new Exception('uuid_4BCP not found... Cannot seed Actuators');

        DB::table('vger_actuators')->insert([
            'id' => '1',
            'uuid' => 'DN20#1',
            'type' => 'Solenoid',
            'description' => 'DN20 Solenoid 12V for Refreshing and Cooling the ambient',
            'model' => 'DN20',
            'active' => true,
            'enabled' => true,
            'module_id' => $AVR_module->id,
            'id_4BCP' => $_4BCP->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $_4BCP = Vger4BCP::where('uuid_4BCP', 0xFFFF2002)->first();
        if (! $_4BCP)
            throw new Exception('uuid_4BCP not found... Cannot seed Actuators');

        DB::table('vger_actuators')->insert([
            'id' => '2',
            'uuid' => 'DN20#2',
            'type' => 'Solenoid',
            'description' => 'DN20 Solenoid 12V for Refreshing and Cooling the ambient',
            'model' => 'DN20',
            'active' => true,
            'enabled' => true,
            'module_id' => $AVR_module->id,
            'id_4BCP' => $_4BCP->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $_4BCP = Vger4BCP::where('uuid_4BCP', 0xFFFF2003)->first();
        if (! $_4BCP)
            throw new Exception('uuid_4BCP not found... Cannot seed Actuators');

        DB::table('vger_actuators')->insert([
            'id' => '3',
            'uuid' => 'DN20#3',
            'type' => 'Solenoid',
            'description' => 'DN20 Solenoid 12V for Refreshing and Cooling the ambient',
            'model' => 'DN20',
            'active' => true,
            'enabled' => true,
            'module_id' => $AVR_module->id,
            'id_4BCP' => $_4BCP->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $_4BCP = Vger4BCP::where('uuid_4BCP', 0xFFFF2004)->first();
        if (! $_4BCP)
            throw new Exception('uuid_4BCP not found... Cannot seed Actuators');

        DB::table('vger_actuators')->insert([
            'id' => '4',
            'uuid' => 'DN20#4',
            'type' => 'Solenoid',
            'description' => 'DN20 Solenoid 12V for Refreshing and Cooling the ambient',
            'model' => 'DN20',
            'active' => true,
            'enabled' => true,
            'module_id' => $AVR_module->id,
            'id_4BCP' => $_4BCP->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

//         /**
//          * CLIMATIZATION BOARD #2
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_climatization_board#2')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_climatization_board#1 not found... Cannot seed ACTUATORS');

//         DB::table('vger_actuators')->insert([
//             'id' => '2',
//             'uuid' => 'DN20#2',
//             'type' => 'Solenoid',
//             'description' => 'DN20 Solenoid 12V for Refreshing and Cooling the ambient',
//             'model' => 'DN20',
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
//             throw new Exception('Command MODULE AVR_climatization_board#1 not found... Cannot seed ACTUATORS');

//         DB::table('vger_actuators')->insert([
//             'id' => '3',
//             'uuid' => 'DN20#3',
//             'type' => 'Solenoid',
//             'description' => 'DN20 Solenoid 12V for Refreshing and Cooling the ambient',
//             'model' => 'DN20',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * ***************************************** SOILD BOARDS ACTUATORS ********************************************
//          */

//         /**
//          * SOIL BOARD #1
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_soil_board#1')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_climatization_board#1 not found... Cannot seed ACTUATORS');

//         DB::table('vger_actuators')->insert([
//             'id' => '4',
//             'uuid' => '2W16015#1',
//             'type' => 'Solenoid',
//             'description' => '2W16015 Solenoid 12V for irrigation',
//             'model' => '2W16015',
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
//             throw new Exception('Command MODULE AVR_climatization_board#2 not found... Cannot seed ACTUATORS');

//         DB::table('vger_actuators')->insert([
//             'id' => '5',
//             'uuid' => '2W16015#2',
//             'type' => 'Solenoid',
//             'description' => '2W16015 Solenoid 12V for irrigation',
//             'model' => '2W16015',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);

//         /**
//          * SOIL BOARD #3
//          */
//         $AVR_module = VgerModules::where('name', 'AVR_soil_board#3')->first();
//         if (! $AVR_module)
//             throw new Exception('Command MODULE AVR_climatization_board#3 not found... Cannot seed ACTUATORS');

//         DB::table('vger_actuators')->insert([
//             'id' => '6',
//             'uuid' => '2W16015#3',
//             'type' => 'Solenoid',
//             'description' => '2W16015 Solenoid 12V for irrigation',
//             'model' => '2W16015',
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
//             throw new Exception('Command MODULE AVR_climatization_board#4 not found... Cannot seed ACTUATORS');

//         DB::table('vger_actuators')->insert([
//             'id' => '7',
//             'uuid' => '2W16015#4',
//             'type' => 'Solenoid',
//             'description' => '2W16015 Solenoid 12V for irrigation',
//             'model' => '2W16015',
//             'active' => true,
//             'enabled' => true,
//             'module_id' => $AVR_module->id,
//             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//             'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//         ]);
    }
}
