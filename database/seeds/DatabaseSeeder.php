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
        $this->call(VgerTableSeeder::class);
        $this->call(VgerTypesTableSeeder::class);
        $this->call(VgerModulesTypeTableSeeder::class);
        $this->call(VgerModulesTableSeeder::class);
        $this->call(VgerSensorsTableSeeder::class);
        $this->call(VgerActuatorsTableSeeder::class);
        $this->call(VgerCommandsTypeTableSeeder::class);
        $this->call(VgerCommandsTableSeeder::class);
        $this->call(VgerRulesTableSeeder::class);
        
        Model::unguard();
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(VgerRoleUserTableSeeder::class);
        Model::reguard();
    }
}
