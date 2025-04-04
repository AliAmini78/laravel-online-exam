<?php

namespace Api\Auth\Database\Repositories\Repos;

use Api\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use Api\Base\Database\Repositories\Repos\BaseRepository;
use Api\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login(array $inputs): mixed
    {
        if (!Auth::validate($inputs))
            return [
                'result' => false,
                "message" => __('messages.login_error'),
            ];

        $user = $this->model->where("email", $inputs['email'])->first();

        $token = $user->createToken("auth_token")->plainTextToken;

        $cookie = Cookie::make("auth_token", $token, 60);

        return [
            "result" => true,
            "message" => __('messages.login_success'),
            "token" => $token,
            "cookie" => $cookie,
        ];
    }
}
