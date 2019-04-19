<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintechsModulesTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sintechs_modules_type')->insert([
            'id' => 1,
            'name' => 'arduino',
            'description' => 'Arduino Board'
        ]);
        
        DB::table('sintechs_modules_type')->insert([
            'id' => 2,
            'name' => 'arduino_comm',
            'description' => 'Arduino Communication Board'
        ]);
        
        DB::table('sintechs_modules_type')->insert([
            'id' => 3,
            'name' => 'pi_board',
            'description' => 'PI Board'
        ]);
        
        DB::table('sintechs_modules_type')->insert([
            'id' => 4,
            'name' => 'software',
            'description' => 'Software Modules'
        ]);
        
    }
}
