<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VgerModulesTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vger_modules_type')->insert([
            'id' => 1,
            'name' => 'arduino',
            'description' => 'Arduino Board',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_modules_type')->insert([
            'id' => 2,
            'name' => 'arduino_comm',
            'description' => 'Arduino Communication Board',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_modules_type')->insert([
            'id' => 3,
            'name' => 'pi_board',
            'description' => 'PI Board',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('vger_modules_type')->insert([
            'id' => 4,
            'name' => 'software',
            'description' => 'Software Modules',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
