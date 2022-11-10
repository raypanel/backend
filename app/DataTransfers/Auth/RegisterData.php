<?php


namespace App\DataTransfers\Auth;


use Spatie\LaravelData\Data;

class RegisterData extends Data
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
