<?php

namespace Api\User\Http\Controllers;

use Api\Base\Http\Controllers\ApiController;
use Api\User\Database\Repositories\Contracts\UserRepositoryInterface;
use Api\User\Http\Requests\UserRequest;
use Api\User\Http\Resources\Admin\AdminUserResource;
use Api\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminUserController extends ApiController
{
    private UserRepositoryInterface $userRepository;

    private string $controllerName = "کاربر";

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $result = AdminUserResource::collection($this->userRepository->getAllWithPagination($request));
        return $this->successResponse($result , 200 , null , $result->response()->getData()->meta);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function show(User $user , Request $request)
    {
        $user->load($request->get('relations') ?? []);

        return $this->successResponse(new AdminUserResource($user));
    }

    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function create(UserRequest $request)
    {

        $result = $this->userRepository->create($request->validated());
        return $this->successResponse(new AdminUserResource($result) , 201 , __("messages.created" , ["attribute" => $this->controllerName]));
    }
}
