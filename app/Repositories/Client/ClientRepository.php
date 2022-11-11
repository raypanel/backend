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

    public function getClients(array $where = [], $paginate = 20)
    {
        $this->applyConditions($where);

        $data = $this->orderBy('id', 'DESC')
            ->paginate($paginate);

        $this->resetModel();
        return $data;
    }
}
