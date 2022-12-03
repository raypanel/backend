<?php

use Illuminate\Http\Response;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

function apiResponse($success, $data = [], $code = 0): Response|Application|ResponseFactory
{
    return response([
        'success' => (bool)$success,
        $success ? 'data' : 'errors' => json_decode($data),
    ], $code ? $code : ($success ? 200 : 422));
}
