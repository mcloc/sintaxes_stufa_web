<?php
use App\VgerCommandsType;
use App\VgerModules;
use App\VgerModulesType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerCommandsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AVR_type = VgerModulesType::where('name', 'AVR')->first();
        if (! $AVR_type)
            throw new Exception('Module Type "AVR" not found... Cannot seed MODULES.');

        /**
         * *
         *
         * all AVR modules gets this 3 commands by default (GET_DATA, GET_INFO, GET_STATUS)
         *
         * @var unknown $AVR_module
         */
        $AVR_modules = VgerModules::where('type_id', $AVR_type->id)->get();
        if (! $AVR_modules || count($AVR_modules) == 0)
            throw new Exception('Command MODULE for AVR_boards not found... Cannot seed Commands');

        $cmd_type_get_data = VgerCommandsType::where('name', 'GET_DATA')->first();
        if (! $cmd_type_get_data)
            throw new Exception('Command TYPE GET_DATA not found... Cannot seed GET_DATA');
        $cmd_type_get_info = VgerCommandsType::where('name', 'GET_INFO')->first();
        if (! $cmd_type_get_info)
            throw new Exception('Command TYPE GET_INFO not found... Cannot seed COMMAND');
        $cmd_type_get_status = VgerCommandsType::where('name', 'GET_STATUS')->first();
        if (! $cmd_type_get_status)
            throw new Exception('Command TYPE GET_STATUS not found... Cannot seed COMMAND');

        $i = 1;
        foreach ($AVR_modules as $AVR_module) {
            DB::table('vger_commands')->insert([
                'id' => $i,
                'type_id' => $cmd_type_get_data->id,
                'module_id' => $AVR_module->id,
                'command' => 'GET_DATA',
                'enabled' => true,
                'description' => 'Get all Sensors,actuators and valiable data',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $i++;

            DB::table('vger_commands')->insert([
                'id' => $i,
                'type_id' => $cmd_type_get_info->id,
                'module_id' => $AVR_module->id,
                'command' => 'GET_INFO',
                'enabled' => true,
                'description' => 'GET INFO on configuration set',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $i++;

            DB::table('vger_commands')->insert([
                'id' => $i,
                'type_id' => $cmd_type_get_status->id,
                'module_id' => $AVR_module->id,
                'command' => 'GET_STATUS',
                'enabled' => true,
                'description' => 'GET Running Status such as uptime and other running info',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $i++;
        }
    }
}
