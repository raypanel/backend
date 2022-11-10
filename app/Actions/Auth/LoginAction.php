<?php


namespace App\Actions\Auth;


use App\DataTransfers\Auth\LoginData;
use App\Exceptions\Auth\InvalidPasswordException;
use App\Exceptions\ModelNotFoundException;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginAction
{
    protected UserRepositoryInterface $userRepository;

    /**
     * LoginAction constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginData $data)
    {
        $user = $this->userRepository->findByEmail($data->email);

        if (! $user) {
            throw (new ModelNotFoundException())->setModel(User::class);
        }
        dd('s');
        if (! Hash::check($data->password, $user->password)) {
            throw new InvalidPasswordException();
        }

        $personalAccessToken = $user->createToken('auth');
        $user->withAccessToken($personalAccessToken);

        return $user;
    }
}
