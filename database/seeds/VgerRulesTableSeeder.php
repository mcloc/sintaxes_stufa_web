<?php

use App\VgerModules;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerRulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AVR_module = VgerModules::where('name', 'AVR_climatization_board#1')->first();
        if (! $AVR_module)
            throw new Exception('Command MODULE AVR_climatization_board#1 not found... Cannot seed RULE');
            
        
        DB::table('vger_rules')->insert([
            'id' => '1',
            'rule_title' => '001-DHT11#1',
            'drl_file' => 'actuator_001.drl',
            'drl_package' => 'resources.rules.boards.AVR_001',
            'active' => true,
            'description' => 'Rule to evalute max_heat_index from sensor DHT11#1@AVR_board#1',
            'module_id' => $AVR_module->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
