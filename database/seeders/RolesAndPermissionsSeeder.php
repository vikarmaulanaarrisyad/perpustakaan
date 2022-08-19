<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $editPermissions   = Permission::create(['name' => 'edit permissions']);
        $deletePermissions = Permission::create(['name' => 'delete permissions']);
        $editRoles   = Permission::create(['name' => 'edit roles']);
        $deleteRoles = Permission::create(['name' => 'delete roles']);
        $editUser   = Permission::create(['name' => 'edit user']);
        $deleteUser = Permission::create(['name' => 'delete user']);

        // this can be done as separate statements
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSiswa = Role::create(['name' => 'siswa']);

        // create roles and assign created permissions
        $roleAdmin->givePermissionTo(Permission::all());
    }
}
