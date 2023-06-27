<?php

namespace App\Contracts;

use App\DTOs\PasswordEmailDto;

interface PasswordEmailContract
{
    /**
     * @param PasswordEmailDto $passwordEmailDto
     */
    public function resetPasswordLink(PasswordEmailDto $passwordEmailDto);
}
