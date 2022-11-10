<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, RegisterAction $action)
    {
        $action->execute($request->getData());

        return apiResponse(true, ['user was created.']);
    }
}
