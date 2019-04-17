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
            'fullname' => 'Sintechs Development Company LTDA.',
            'email' => 'support@sintechs.com.br',
            'email_verified_at' => now(),
            'cpf_cnpj' => '11111111111',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);
    }
}
