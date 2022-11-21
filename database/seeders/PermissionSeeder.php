<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'create user',
            'edit user',
            'list user',
            'delete user',
            'create role',
            'edit role',
            'list role',
            'delete role',
            'create permission',
            'edit permission',
            'list permission',
            'delete permission'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'web','name' => $permission]);
        }
    }
}
