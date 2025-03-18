<?php

namespace Api\User\Http\Controllers;

use Api\Base\Http\Controllers\ApiController;
use Api\User\Database\Repositories\Contracts\UserRepositoryInterface;

class UserController extends ApiController
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
    }
}
