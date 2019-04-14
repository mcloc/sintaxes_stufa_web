<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            [
                'name'        => 'Chamge System Actuators Values',
                'slug'        => 'view.users',
                'description' => 'Can Chamge System Actuators Config Values',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Chamge System Rules Values',
                'slug'        => 'view.users',
                'description' => 'Can Chamge System Rules Config Values',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Chamge System Values',
                'slug'        => 'view.users',
                'description' => 'Can Chamge System Values',
                'model'       => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
