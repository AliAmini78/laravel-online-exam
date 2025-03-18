<?php

namespace Api\User\Http\Controllers;

use Api\Base\Http\Controllers\ApiController;
use Api\User\Database\Repositories\Contracts\UserRepositoryInterface;
use Api\User\Http\Resources\Admin\AdminUserResource;
use Illuminate\Http\Request;

class AdminUserController extends ApiController
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $result = AdminUserResource::collection($this->userRepository->getAllWithPagination($request));
        return $this->successResponse($result , 200 , null , $result->response()->getData()->meta);
    }
}
