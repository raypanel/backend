<?php

use Illuminate\Http\Response;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

function apiResponse($success, $data = [], $code = 0): Response|Application|ResponseFactory
{
    return response([
        'success' => (bool)$success,
        $success ? 'data' : 'errors' => is_string($data) ? json_decode($data) : $data,
    ], $code ? $code : ($success ? 200 : 422));
}
