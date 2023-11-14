<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name'=>'View Admin']);

        Permission::create(['name'=>'View Products']);
        Permission::create(['name'=>'Create Products']);
        Permission::create(['name'=>'Edit Products']);
        Permission::create(['name'=>'Delete Products']);

        Permission::create(['name'=>'View Categories']);
        Permission::create(['name'=>'Create Categories']);
        Permission::create(['name'=>'Edit Categories']);
        Permission::create(['name'=>'Delete Categories']);

        Permission::create(['name'=>'View Users']);
        Permission::create(['name'=>'Create Users']);
        Permission::create(['name'=>'Edit Users']);
        Permission::create(['name'=>'Delete Users']);

        Permission::create(['name'=>'View Roles']);
        Permission::create(['name'=>'Create Roles']);
        Permission::create(['name'=>'Edit Roles']);
        Permission::create(['name'=>'Delete Roles']);

        Permission::create(['name'=>'View Permissions']);
        Permission::create(['name'=>'Create Permissions']);
        Permission::create(['name'=>'Edit Permissions']);
        Permission::create(['name'=>'Delete Permissions']);

        Permission::create(['name'=>'View Orders']);
        Permission::create(['name'=>'Edit Orders']);
        Permission::create(['name'=>'Delete Orders']);

        Permission::create(['name'=>'Order Buy']);

        $role = Role::create(['name'=>'Super Admin']);

        $role = Role::create(['name'=>'Products Manager'])->givePermissionTo([
            'View Admin',
            'View Products',
            'Create Products',
            'Edit Products',
            'Delete Products',
            'View Categories',
            'Create Categories',
            'Edit Categories',
            'Delete Categories',
            'Order Buy'
        ]);

        $role = Role::create(['name'=>'Users Manager'])->givePermissionTo([
            'View Admin',
            'View Users',
            'Create Users',
            'Edit Users',
            'Delete Users',
            'View Roles',
            'Create Roles',
            'Edit Roles',
            'Delete Roles',
            'View Permissions',
            'Create Permissions',
            'Edit Permissions',
            'Delete Permissions',
            'Order Buy'
        ]);

        $role = Role::create(['name'=>'Order Manager'])->givePermissionTo([
            'View Admin',
            'View Orders',
            'Edit Orders',
            'Delete Orders',
            'View Users',
            'View Products',
            'Edit Products',
            'Delete Products',
            'Order Buy'
        ]);

        $role = Role::create(['name'=>'Customer'])->givePermissionTo(['Order Buy']);
    }
}
