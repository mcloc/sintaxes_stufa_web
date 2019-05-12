<?php

use Database\Seeds\ConnectRelationshipsSeeder;
use Database\Seeds\PermissionsTableSeeder;
use Database\Seeds\RolesTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SintechsTableSeeder::class);
        $this->call(SintechsTypesTableSeeder::class);
        $this->call(SintechsModulesTypeTableSeeder::class);
        $this->call(SintechsModulesTableSeeder::class);
        $this->call(SintechsCommandsTypeTableSeeder::class);
        $this->call(SintechsCommandsTableSeeder::class);
        $this->call(SintechsSensorsTableSeeder::class);
        $this->call(SintechsActuatorsTableSeeder::class);
        $this->call(SintechsRulesTableSeeder::class);
        
        Model::unguard();
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(SintechsRoleUserTableSeeder::class);
        Model::reguard();
    }
}
