<?php

use App\SintechsModules;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsRulesTableSeeder extends Seeder
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
            throw new Exception('Command MODULE arduino_board#1 not found... Cannot seed RULE');
            
        
        DB::table('sintechs_rules')->insert([
            'id' => '1',
            'rule_title' => '001-max-heat_index-arduino_board_01',
            'drl_file' => 'controlActuators_arduino_board_01.drl',
            'drl_package' => 'resources.rules.sensors.arduino_board_01',
            'active' => true,
            'description' => 'Rule to evalute max_heat_index from sensor DHT11#1@arduino_board#1',
            'module_id' => $arduino_module->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
