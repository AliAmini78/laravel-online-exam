<?php

namespace Api\Auth\Http\Controllers;

use Api\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login()
    {
        dd('asd');
    }
}
