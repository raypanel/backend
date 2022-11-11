<?php


namespace App\Repositories\Client;


use App\Models\Client;
use App\Repositories\BaseRepository;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{

    public function model(): string
    {
        return Client::class;
    }
}
