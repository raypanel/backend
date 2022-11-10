<?php


namespace App\Actions\Auth;


use App\DataTransfers\Auth\RegisterData;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterAction
{
    protected UserRepositoryInterface $userRepository;

    /**
     * RegisterAction constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterData $data)
    {
        return $this->userRepository->create([
            'email'            => $data->email,
            'password'         => Hash::make($data->password),
            'email_verified_at' => now(),
        ]);
    }
}
