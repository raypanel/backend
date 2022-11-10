<?php


namespace App\DataTransfers\Auth;

use Spatie\LaravelData\Data;

class LoginData extends Data
{
    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;
}
