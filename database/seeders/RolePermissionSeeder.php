<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Super Admin']);

        $permissions = [
            [
                'group_name' => 'Admin Dashboard',
                'permissions' => ['Dashboard View']
            ],
            [
                'group_name' => 'Settings',
                'permissions' => [
                    'Settings Sidebar Button',
                    'Settings Update Button',
                    'Settings List Page',
                ]
            ],
            [
                'group_name' => 'Profile',
                'permissions' => [
                    'Profile Header Button',
                    'Profile List Page',
                    'Profile Update Button',
                    'Password Update Button',
                ]
            ],
            [
                'group_name' => 'Role',
                'permissions' => [
                    'Role Sidebar Button',
                    'Role List Page',
                    'Role Create',
                    'Role Edit',
                    'Role Delete',
                ]
            ],
            [
                'group_name' => 'User',
                'permissions' => [
                    'User Sidebar Button',
                    'User List Page',
                    'User Create',
                    'User Edit',
                    'User Delete',
                ]
            ]
        ];

        for ($i = 0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {

                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $role->givePermissionTo($permission);
                $permission->assignRole($role);
            }
        }

        $role->syncPermissions(Permission::all());

        $user = User::first();
        $user->assignRole($role);
    }
}
