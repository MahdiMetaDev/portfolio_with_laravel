<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class ApiBaseController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function sendResponse($data, string|null $message = null, int $statusCode = 200): JsonResponse
    {
        return response()->json(compact('data', 'message'), $statusCode);
    }

    protected function sendError($error, $errorMessages = [], $statusCode = 404)
    {
        if (!empty($errorMessages)) {
            return response()->json(compact('error', 'errorMessages'), $statusCode);
        }
        return response()->json('error', $statusCode);
    }
}
