<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use \App\Models\User;

class RolesAndPermissions extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'user_management_access',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_show',
            'role_edit',
            'role_delete',
            'role_access',
            'user_create',
            'user_show',
            'user_edit',
            'user_delete',
            'user_access',
            'job_create',
            'job_edit',
            'job_delete',
            'job_access',
            'tag_create',
            'tag_edit',
            'tag_delete',
            'tag_access',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'profile_access',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        Role::create(['name' => 'Admin']);

        Role::create(['name' => 'Freelancer']);

        $role = Role::create(['name' => 'User']);

        $userPermissions = [
            'job_create',
            'job_edit',
            'job_delete',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
        ];

        foreach ($userPermissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $freelancerPermissions = [
            'job_create',
            'job_edit',
            'job_delete',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
        ];

        foreach ($freelancerPermissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $supporterPermissions = [
            'user_management_access',
            'permission_show',
            'role_create',
            'role_show',
            'user_create',
            'user_show',
            'user_edit',
            'user_delete',
            'user_access',
            'job_create',
            'job_edit',
            'job_delete',
            'job_access',
            'tag_create',
            'tag_edit',
            'tag_delete',
            'tag_access',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'profile_access',
        ];

        foreach ($supporterPermissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $adminPermissions = [
            'user_management_access',
            'permission_create',
            'permission_edit',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_edit',
            'role_delete',
            'role_access',
            'user_create',
            'user_edit',
            'user_delete',
            'user_access',
            'job_create',
            'job_edit',
            'job_delete',
            'job_access',
            'tag_create',
            'tag_edit',
            'tag_delete',
            'tag_access',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'profile_access',
        ];

        foreach ($adminPermissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
