<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'super-admin', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'admin', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'manager', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'agent', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'user', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'sale-representative', 'guard_name' => 'web'],
            ['id' => 7, 'name' => 'assistant-sale-manager', 'guard_name' => 'web'],
            ['id' => 8, 'name' => 'sale-manager', 'guard_name' => 'web'],
            ['id' => 9, 'name' => 'business-manager', 'guard_name' => 'web'],
            ['id' => 10, 'name' => 'group-manager', 'guard_name' => 'web'],
            ['id' => 11, 'name' => 'zonal-manager', 'guard_name' => 'web'],
            ['id' => 12, 'name' => 'regional-manager', 'guard_name' => 'web'],
            ['id' => 13, 'name' => 'national-sale-director', 'guard_name' => 'web'],
        ];

        $saleRepresentativePermissions = [
            Permission::CAN_VIEW_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_CREATE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_EDIT_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];
        $assistantSaleManagerPermissions = [
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];
        $saleManagerPermissions = [
            Permission::CAN_VIEW_ZONAL_MANAGER_USER,
            Permission::CAN_CREATE_ZONAL_MANAGER_USER,
            Permission::CAN_EDIT_ZONAL_MANAGER_USER,
            Permission::CAN_DELETE_ZONAL_MANAGER_USER,
            Permission::CAN_VIEW_GROUP_MANAGER_USER,
            Permission::CAN_CREATE_GROUP_MANAGER_USER,
            Permission::CAN_EDIT_GROUP_MANAGER_USER,
            Permission::CAN_DELETE_GROUP_MANAGER_USER,
            Permission::CAN_VIEW_BUSINESS_MANAGER_USER,
            Permission::CAN_CREATE_BUSINESS_MANAGER_USER,
            Permission::CAN_EDIT_BUSINESS_MANAGER_USER,
            Permission::CAN_DELETE_BUSINESS_MANAGER_USER,
            Permission::CAN_VIEW_SALE_MANAGER_USER,
            Permission::CAN_CREATE_SALE_MANAGER_USER,
            Permission::CAN_EDIT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_SALE_MANAGER_USER,
            Permission::CAN_VIEW_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_CREATE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_EDIT_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];
        $businessManagerPermissions = [
            Permission::CAN_VIEW_SALE_MANAGER_USER,
            Permission::CAN_CREATE_SALE_MANAGER_USER,
            Permission::CAN_EDIT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_SALE_MANAGER_USER,
            Permission::CAN_VIEW_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_CREATE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_EDIT_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];
        $groupManagerPermissions = [
            Permission::CAN_VIEW_BUSINESS_MANAGER_USER,
            Permission::CAN_CREATE_BUSINESS_MANAGER_USER,
            Permission::CAN_EDIT_BUSINESS_MANAGER_USER,
            Permission::CAN_DELETE_BUSINESS_MANAGER_USER,
            Permission::CAN_VIEW_SALE_MANAGER_USER,
            Permission::CAN_CREATE_SALE_MANAGER_USER,
            Permission::CAN_EDIT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_SALE_MANAGER_USER,
            Permission::CAN_VIEW_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_CREATE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_EDIT_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];
        $zonalManagerPermissions = [
            Permission::CAN_VIEW_GROUP_MANAGER_USER,
            Permission::CAN_CREATE_GROUP_MANAGER_USER,
            Permission::CAN_EDIT_GROUP_MANAGER_USER,
            Permission::CAN_DELETE_GROUP_MANAGER_USER,
            Permission::CAN_VIEW_BUSINESS_MANAGER_USER,
            Permission::CAN_CREATE_BUSINESS_MANAGER_USER,
            Permission::CAN_EDIT_BUSINESS_MANAGER_USER,
            Permission::CAN_DELETE_BUSINESS_MANAGER_USER,
            Permission::CAN_VIEW_SALE_MANAGER_USER,
            Permission::CAN_CREATE_SALE_MANAGER_USER,
            Permission::CAN_EDIT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_SALE_MANAGER_USER,
            Permission::CAN_VIEW_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_CREATE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_EDIT_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];
        $regionalManagerPermissions = [
            Permission::CAN_VIEW_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_CREATE_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_EDIT_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_DELETE_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_VIEW_ZONAL_MANAGER_USER,
            Permission::CAN_CREATE_ZONAL_MANAGER_USER,
            Permission::CAN_EDIT_ZONAL_MANAGER_USER,
            Permission::CAN_DELETE_ZONAL_MANAGER_USER,
            Permission::CAN_VIEW_GROUP_MANAGER_USER,
            Permission::CAN_CREATE_GROUP_MANAGER_USER,
            Permission::CAN_EDIT_GROUP_MANAGER_USER,
            Permission::CAN_DELETE_GROUP_MANAGER_USER,
            Permission::CAN_VIEW_BUSINESS_MANAGER_USER,
            Permission::CAN_CREATE_BUSINESS_MANAGER_USER,
            Permission::CAN_EDIT_BUSINESS_MANAGER_USER,
            Permission::CAN_DELETE_BUSINESS_MANAGER_USER,
            Permission::CAN_VIEW_SALE_MANAGER_USER,
            Permission::CAN_CREATE_SALE_MANAGER_USER,
            Permission::CAN_EDIT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_SALE_MANAGER_USER,
            Permission::CAN_VIEW_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_CREATE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_EDIT_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];
        $nationalSaleDirectorPermissions = [
            Permission::CAN_VIEW_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_CREATE_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_EDIT_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_DELETE_NATIONAL_SALE_DIRECTOR_USER,
            Permission::CAN_VIEW_ZONAL_MANAGER_USER,
            Permission::CAN_CREATE_ZONAL_MANAGER_USER,
            Permission::CAN_EDIT_ZONAL_MANAGER_USER,
            Permission::CAN_DELETE_ZONAL_MANAGER_USER,
            Permission::CAN_VIEW_GROUP_MANAGER_USER,
            Permission::CAN_CREATE_GROUP_MANAGER_USER,
            Permission::CAN_EDIT_GROUP_MANAGER_USER,
            Permission::CAN_DELETE_GROUP_MANAGER_USER,
            Permission::CAN_VIEW_BUSINESS_MANAGER_USER,
            Permission::CAN_CREATE_BUSINESS_MANAGER_USER,
            Permission::CAN_EDIT_BUSINESS_MANAGER_USER,
            Permission::CAN_DELETE_BUSINESS_MANAGER_USER,
            Permission::CAN_VIEW_SALE_MANAGER_USER,
            Permission::CAN_CREATE_SALE_MANAGER_USER,
            Permission::CAN_EDIT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_SALE_MANAGER_USER,
            Permission::CAN_VIEW_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_CREATE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_EDIT_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_DELETE_ASSISTANT_SALE_MANAGER_USER,
            Permission::CAN_VIEW_SALE_REPRESENTATIVE_USER,
            Permission::CAN_CREATE_SALE_REPRESENTATIVE_USER,
            Permission::CAN_EDIT_SALE_REPRESENTATIVE_USER,
            Permission::CAN_DELETE_SALE_REPRESENTATIVE_USER
        ];

        $adminPermissions = [
            Permission::CAN_VIEW_MANAGER,
            Permission::CAN_CREATE_MANAGER,
            Permission::CAN_EDIT_MANAGER,
            Permission::CAN_DELETE_MANAGER,
            Permission::CAN_VIEW_AGENT,
            Permission::CAN_CREATE_AGENT,
            Permission::CAN_EDIT_AGENT,
            Permission::CAN_DELETE_AGENT,
            Permission::CAN_VIEW_USER,
            Permission::CAN_CREATE_USER,
            Permission::CAN_EDIT_USER,
            Permission::CAN_DELETE_USER,
            Permission::CAN_VIEW_REGIONAL_MANAGER_USER,
            Permission::CAN_CREATE_REGIONAL_MANAGER_USER,
            Permission::CAN_EDIT_REGIONAL_MANAGER_USER,
            Permission::CAN_DELETE_REGIONAL_MANAGER_USER,
            Permission::CAN_VIEW_ZONAL_MANAGER_USER,
            Permission::CAN_CREATE_ZONAL_MANAGER_USER,
            Permission::CAN_EDIT_ZONAL_MANAGER_USER,
            Permission::CAN_DELETE_ZONAL_MANAGER_USER,
            Permission::CAN_VIEW_LOCATION,
            Permission::CAN_CREATE_LOCATION,
            Permission::CAN_EDIT_LOCATION,
            Permission::CAN_DELETE_LOCATION,
            Permission::CAN_VIEW_PRODUCT,
            Permission::CAN_EDIT_PRODUCT,
            Permission::CAN_DELETE_PRODUCT,
            Permission::CAN_CREATE_PRODUCT,
            Permission::CAN_VIEW_ORDER,
            Permission::CAN_CREATE_ORDER,
            Permission::CAN_DELETE_ORDER,
            Permission::CAN_EDIT_ORDER,
            Permission::CAN_VIEW_COMMISSION,
            Permission::CAN_CREATE_COMMISSION,
            Permission::CAN_EDIT_COMMISSION,
            Permission::CAN_DELETE_COMMISSION,
            Permission::CAN_VIEW_FILE,
            Permission::CAN_UPLOAD_FILE,
            Permission::CAN_EDIT_FILE,
            Permission::CAN_DELETE_FILE,
            Permission::HAS_ALL_ORDERS_ACCESS,
            Permission::HAS_ALL_LOCATIONS_ACCESS,
            Permission::HAS_ALL_FILES_ACCESS,
            Permission::HAS_ALL_PRODUCTS_ACCESS,
            Permission::HAS_ALL_COMMISSIONS_ACCESS,
            Permission::HAS_ALL_MANAGERS_ACCESS,
            Permission::HAS_ALL_AGENT_ACCESS,
            Permission::HAS_ALL_USERS_ACCESS,
            Permission::HAS_ALL_SALE_REPRESENTATIVE_USERS_ACCESS,
            Permission::HAS_ALL_ASSISTANT_SALE_MANAGER_USERS_ACCESS,
            Permission::HAS_ALL_SALE_MANAGER_USERS_ACCESS,
            Permission::HAS_ALL_BUSINESS_MANAGER_USERS_ACCESS,
            Permission::HAS_ALL_GROUP_MANAGER_USERS_ACCESS,
            Permission::HAS_ALL_ZONAL_MANAGER_USERS_ACCESS,
            Permission::HAS_ALL_REGIONAL_MANAGER_USERS_ACCESS,
            Permission::HAS_ALL_NATIONAL_SALE_DIRECTOR_USERS_ACCESS
        ];

        $agentPermissions = [
            Permission::CAN_VIEW_USER,
            Permission::CAN_CREATE_USER,
            Permission::CAN_VIEW_COMMISSION
        ];

        $userPermissions = [
            Permission::CAN_VIEW_ORDER,
            Permission::CAN_UPLOAD_FILE,
            Permission::CAN_VIEW_PRODUCT
        ];

        $managerPermissions = [];

        $adminPermissions = array_merge(
            $adminPermissions,
            $agentPermissions,
            $userPermissions,
            $zonalManagerPermissions,
            $groupManagerPermissions,
            $businessManagerPermissions,
            $saleManagerPermissions,
            $assistantSaleManagerPermissions,
            $saleRepresentativePermissions
        );
        $agentPermissions = array_merge($agentPermissions);
        $allPermissions = array_merge($adminPermissions, $agentPermissions, $managerPermissions);

        $rolePermission = [
            Role::SUPER_ADMIN => $allPermissions,
            Role::ADMIN => $adminPermissions,
            ROLE::MANAGER => $managerPermissions,
            ROLE::AGENT => $agentPermissions,
            ROLE::USER => $userPermissions,
            ROLE::SALE_REPRESENTATIVE => $saleRepresentativePermissions,
            ROLE::ASSISTANT_SALE_MANAGER => $assistantSaleManagerPermissions,
            ROLE::SALE_MANAGER => $saleManagerPermissions,
            ROLE::BUSINESS_MANAGER => $businessManagerPermissions,
            ROLE::GROUP_MANAGER => $groupManagerPermissions,
            ROLE::ZONAL_MANAGER => $zonalManagerPermissions,
            ROLE::REGIONAL_MANAGER => $regionalManagerPermissions,
            ROLE::NATIONAL_SALE_DIRECTOR => $nationalSaleDirectorPermissions,
        ];

        foreach ($roles as $role) {
            Log::error("role:" . json_encode($role));
            $newRole = Role::query()->updateOrCreate(['id' => $role['id']], $role);
            if (isset($rolePermission[$newRole->id])) {
                $newRole->givePermissionTo($rolePermission[$newRole->id]);
            }
        }
    }
}
