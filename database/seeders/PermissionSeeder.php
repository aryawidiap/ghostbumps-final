<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'user_management_access',
            'permission_create',
            'permission_index',
            'permission_update',
            'permission_delete',
            'permission_show',
            'role_create',
            'role_index',
            'role_update',
            'role_delete',
            'role_show',
            'user_create',
            'user_index',
            'user_update',
            'user_delete',
            'user_show',
            'location_create',
            'location_index',
            'location_update',
            'location_delete',
            'location_show',
            'booking_create',
            'booking_index',
            'booking_update',
            'booking_delete',
            'booking_show',
        ];
        foreach($permissions as $permission) {
            Permission::create(([
                'name' => $permission
            ]));
        }
        
        

    }
}
