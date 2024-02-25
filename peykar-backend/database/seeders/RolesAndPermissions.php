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
            'profile_create',
            'profile_edit',
            'profile_delete',
            'profile_access',
            'job_create',
            'job_edit',
            'job_delete',
            'job_access',
            'tag_create',
            'tag_edit',
            'tag_delete',
            'tag_access',
            'like_create',
            'like_delete',
            'request_create',
            'request_delete',
            'search',
            'ticket_create',
            'ticket_edit',
            'ticket_delete',
            'ticket_access',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $role = Role::create(['name' => 'User']);

        $userPermissions = [
            'job_create',
            'job_edit',
            'job_delete',
            'profile_create',
            'profile_edit',
            'like_create',
            'like_delete',
            'request_create',
            'request_delete',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'ticket_create',
            'ticket_edit',
        ];

        foreach ($userPermissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Freelancer']);

        $freelancerPermissions = [
            'job_create',
            'job_edit',
            'job_delete',
            'profile_create',
            'profile_edit',
            'like_create',
            'like_delete',
            'request_create',
            'request_delete',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'ticket_create',
            'ticket_edit',
        ];

        foreach ($freelancerPermissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Supporter']);

        $supporterPermissions = [
            'user_management_access',
            'user_create',
            'user_edit',
            'user_delete',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'job_create',
            'job_edit',
            'job_delete',
            'tag_create',
            'tag_edit',
            'tag_delete',
            'like_create',
            'like_delete',
            'request_create',
            'request_delete',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'ticket_create',
            'ticket_edit',
            'ticket_delete',
        ];

        foreach ($supporterPermissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Admin']);

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
            'profile_create',
            'profile_edit',
            'profile_delete',
            'profile_access',
            'job_create',
            'job_edit',
            'job_delete',
            'job_access',
            'tag_create',
            'tag_edit',
            'tag_delete',
            'tag_access',
            'like_create',
            'like_delete',
            'request_create',
            'request_delete',
            'search',
            'profile_create',
            'profile_edit',
            'profile_delete',
            'profile_access',
            'ticket_create',
            'ticket_edit',
            'ticket_delete',
            'ticket_access',
        ];

        foreach ($adminPermissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
