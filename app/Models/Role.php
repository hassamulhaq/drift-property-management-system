<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role as RolePermission;

class Role extends RolePermission
{
    protected $table = 'roles';
    public $fillable = ['name'];

    /**
     * Enums for the Roles's Ids
     */
    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const SALES_AGENT = 3;
    const CUSTOMER = 4;
    const GUEST = null;

    /**
     * One Role Belongs to many users.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
