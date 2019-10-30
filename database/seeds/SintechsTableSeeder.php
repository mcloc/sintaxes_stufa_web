<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vger')->insert([
            'id' => 1,
            'client_id' => 'c0001',
            'instalation_date' => now(),
            'vger_version' => '0.1',
            'employee_id' => 'MCLOC',
            'instalation_description' => 'Development Install',
            'instalation_missing_requirements' => 'More Sensors and development facility',
            'instalation_total_days' => '3',
            'vger_last_update' => now(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
