<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    const CAN_VIEW_USER = 1;
    const CAN_CREATE_USER = 2;
    const CAN_EDIT_USER = 3;
    const CAN_DELETE_USER = 4;
    const HAS_ALL_USERS_ACCESS = 5;
    const CAN_VIEW_PRODUCT = 6;
    const CAN_CREATE_PRODUCT = 7;
    const CAN_EDIT_PRODUCT = 8;
    const HAS_ALL_PRODUCTS_ACCESS = 9;
}

