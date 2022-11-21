<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role =  Role::create([
            'name'       => 'admin',
            'guard_name' => 'web'
        ]);



        $role->givePermissionTo(Permission::all());

    }
}
