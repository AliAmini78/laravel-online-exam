<?php

namespace Api\Base\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * @param $data
     * @param string|null $message
     * @param int $status
     * @param null $meta
     * @return JsonResponse
     */
    public function successResponse($data = null, int $status = 200, string $message = null,  $meta = null): JsonResponse
    {
        return response()->json([
            "status" => "success",
            "message" => $message,
            "data" => $data,
            "meta" => $meta
        ], $status);
    }


    /**
     * @param string|null $message
     * @param int $status
     * @param null $data
     * @return JsonResponse
     */
    public function errorResponse(string $message = null, int $status = 400, $data = null): JsonResponse
    {
        return response()->json([
            "status" => "error",
            "message" => $message,
            "data" => $data,
        ], $status);
    }
}
