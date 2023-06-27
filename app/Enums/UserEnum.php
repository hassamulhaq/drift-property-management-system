<?php

namespace App\Enums;

enum UserEnum: string
{
    case TwoFactorEnabled = '1';

    case TwoFactorDisabled = '0';
}
