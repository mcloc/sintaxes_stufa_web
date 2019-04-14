<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sintechs')->insert([
            'id' => 1,
            'client_id' => 'c0001',
            'instalation_date' => now(),
            'sintechs_version' => '0.1',
            'employee_id' => 'MCLOC',
            'instalation_description' => 'Development Install',
            'instalation_missing_requirements' => 'More Sensors and development facility',
            'instalation_total_days' => '3',
            'sintechs_last_update' => now()
        ]);
    }
}
