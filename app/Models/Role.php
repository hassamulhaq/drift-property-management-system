<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role as RolePermission;

class Role extends RolePermission
{
    protected $table = 'roles';
    public $fillable = ['name'];

    /**
     * Enums for the Role's Ids
     */
    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const MANAGER = 3;
    const AGENT = 4;
    const USER = 5;
    const SALE_REPRESENTATIVE = 6;
    const ASSISTANT_SALE_MANAGER = 7;
    const SALE_MANAGER = 8;
    const BUSINESS_MANAGER = 9;
    const GROUP_MANAGER = 10;
    const ZONAL_MANAGER = 11;
    const REGIONAL_MANAGER = 12;
    const NATIONAL_SALE_DIRECTOR = 13; // don't change to role-id of NSA account as, we use it as user-id:13 for commissions left by missing agent-roles


    /**
     * One Role Belongs to many users.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public static function getLowerRoles(int $roleId = null): ?array
    {
        return match ($roleId) {
            //Role::NATIONAL_SALE_DIRECTOR => [Role::REGIONAL_MANAGER, Role::ZONAL_MANAGER, Role::GROUP_MANAGER, Role::BUSINESS_MANAGER, Role::SALE_MANAGER, Role::ASSISTANT_SALE_MANAGER, Role::SALE_REPRESENTATIVE],
            Role::REGIONAL_MANAGER => [Role::ZONAL_MANAGER, Role::GROUP_MANAGER, Role::BUSINESS_MANAGER, Role::SALE_MANAGER, Role::ASSISTANT_SALE_MANAGER, Role::SALE_REPRESENTATIVE],
            Role::ZONAL_MANAGER => [Role::GROUP_MANAGER, Role::BUSINESS_MANAGER, Role::SALE_MANAGER, Role::ASSISTANT_SALE_MANAGER, Role::SALE_REPRESENTATIVE],
            Role::GROUP_MANAGER => [Role::BUSINESS_MANAGER, Role::SALE_MANAGER, Role::ASSISTANT_SALE_MANAGER, Role::SALE_REPRESENTATIVE],
            Role::BUSINESS_MANAGER => [Role::SALE_MANAGER, Role::ASSISTANT_SALE_MANAGER, Role::SALE_REPRESENTATIVE],
            Role::SALE_MANAGER => [Role::ASSISTANT_SALE_MANAGER, Role::SALE_REPRESENTATIVE],
            Role::ASSISTANT_SALE_MANAGER => [Role::SALE_REPRESENTATIVE],
            default => null
        };
    }
}
