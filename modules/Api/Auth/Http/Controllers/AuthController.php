<?php

namespace Api\Auth\Http\Controllers;

use Api\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use Api\Auth\Http\Requests\LoginRequest;
use Api\Base\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends ApiController
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $result = $this->authRepository->login($request->validated());

        if (!$result['result'])
            return  $this->errorResponse($result['message'] );

        return response()->json([
            "result" => "success",
            "data" => $result['token'],
            "message" => $result['message']
        ])->withCookie($result['cookie']);
    }
}
