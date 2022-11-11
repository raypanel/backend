<?php


namespace App\Actions\Client;


use App\Http\Resources\V1\Client\ClientsResource;
use App\Repositories\Client\ClientRepositoryInterface;

class GetClientsAction
{
    protected ClientRepositoryInterface $clientRepository;

    /**
     * GetClientsAction constructor.
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function execute()
    {
        $clients = $this->clientRepository->getClients();

        return ClientsResource::collection($clients)->response();
    }
}
