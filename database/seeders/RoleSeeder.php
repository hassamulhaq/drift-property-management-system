<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'name' => 'super-admin', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'admin', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'sales-agent', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'customer', 'guard_name' => 'web']
        ];

        $adminPermissions = [
            Permission::HAS_ALL_USERS_ACCESS,
            Permission::CAN_VIEW_USER,
            Permission::CAN_CREATE_USER,
            Permission::CAN_EDIT_USER,
            Permission::CAN_DELETE_USER,
            Permission::CAN_VIEW_PRODUCT,
            Permission::CAN_CREATE_PRODUCT,
            Permission::CAN_EDIT_PRODUCT,
            Permission::HAS_ALL_PRODUCTS_ACCESS,
        ];

        $salesAgentPermissions = [];

        $customerPermissions = [
            Permission::CAN_VIEW_PRODUCT,
        ];

        $allPermissions = array_merge($adminPermissions, $salesAgentPermissions);

        $rolePermission = [
            1 => $allPermissions,
            2 => $adminPermissions,
            3 => $salesAgentPermissions,
            4 => $customerPermissions
        ];

        foreach ($roles as $role) {
            $newRole = Role::query()->updateOrCreate(['id' => $role['id']], $role);
            if (isset($rolePermission[$newRole->id])) {
                $newRole->givePermissionTo($rolePermission[$newRole->id]);
            }
        }
    }
}
