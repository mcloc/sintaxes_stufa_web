<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sintechs',
            'email' => 'suport@sintechs.com.br',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);
    }
}
