<?php

namespace App\Exceptions\Auth;

use Exception;

class InvalidPasswordException extends Exception
{
    public function render($request)
    {
        return apiResponse(false, ['invalid.password']);
    }
}
