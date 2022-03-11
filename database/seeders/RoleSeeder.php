<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'menu.view'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'file.all'])->assignRole($role1);
        Permission::create(['name' => 'files.user'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'user.edit'])->assignRole($role1);
        Permission::create(['name' => 'user.delete'])->assignRole($role1);


    }
}
