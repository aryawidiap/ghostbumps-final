<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name' => 'admin'])->syncPermissions(
            [
                'user_management_access',
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
            ]
        );
        Role::create(['name' => 'employee'])->syncPermissions(
            [
                'user_create',
                'user_index',
                'user_show',
                'booking_create',
                'booking_index',
                'booking_update',
                'booking_delete',
                'booking_show',
            ]
        );
        Role::create(['name' => 'customer'])->syncPermissions(
            [
                'user_create',
                'user_update',
                'user_delete',
                'user_show',
                'booking_create',
                'booking_index',
                'booking_update',
                'booking_delete',
                'booking_show',
            ]
        );


        // Create a super admin
        // Get all permission by Gate::before rule
        // see: AuthServiceProvide.php
        Role::create(['name' => 'Super Admin']);
    }
}
