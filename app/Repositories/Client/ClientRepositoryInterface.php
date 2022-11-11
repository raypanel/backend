<?php


namespace App\Repositories\Client;


use Prettus\Repository\Contracts\RepositoryInterface;

interface ClientRepositoryInterface extends RepositoryInterface
{
    public function getClients(array $where = [], $paginate = 20);
}
