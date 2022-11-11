<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Client\GetClientsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(GetClientsAction $action)
    {
        return $action->execute();
    }
}
