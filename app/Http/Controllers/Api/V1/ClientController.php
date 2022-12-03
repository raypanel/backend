<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Client\GetClientsAction;
use App\Actions\Client\StoreClientAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function index(GetClientsAction $action)
    {
        return $action->execute();
    }

    public function store(ClientRequest $request, StoreClientAction $action)
    {
        $client = $action->execute($request->getData());

        return apiResponse(true, $client, Response::HTTP_CREATED);
    }
}
