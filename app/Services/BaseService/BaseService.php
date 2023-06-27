<?php

namespace App\Services\BaseService;

use App\Http\Traits\CustomHash;
use App\Http\Traits\VerificationToken;

class BaseService
{
    use CustomHash, VerificationToken;
}
