<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'name' => 'CAN_VIEW_USER', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'CAN_CREATE_USER', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'CAN_EDIT_USER', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'CAN_DELETE_USER', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'HAS_ALL_USERS_ACCESS', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'CAN_VIEW_PRODUCT', 'guard_name' => 'web'],
            ['id' => 7, 'name' => 'CAN_CREATE_PRODUCT', 'guard_name' => 'web'],
            ['id' => 8, 'name' => 'CAN_EDIT_PRODUCT', 'guard_name' => 'web'],
            ['id' => 9, 'name' => 'HAS_ALL_PRODUCTS_ACCESS', 'guard_name' => 'web']
        ];

        foreach ($permissions as $permission) {
            Permission::query()->updateOrCreate([
                'id' => $permission['id']
            ], $permission);
        }
    }
}
