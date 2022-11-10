<?php


namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function model(): string
    {
        return User::class;
    }

    public function findByEmail(string $email)
    {
        $this->applyConditions([
            'email' => $email,
        ]);

        $data = $this->first();

        $this->resetModel();
        return $data;
    }
}
