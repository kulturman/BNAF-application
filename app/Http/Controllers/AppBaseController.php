<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($success , $message = null , $reset = true
        , $url = null , $dialog = true , $data = null): JsonResponse {
        return response()->json([
            'success' =>$success , 'message' => $message , 'reset' => $reset,
            'reset' => $reset,  'url' => $url, 'data' =>$data, 'dialog' => $dialog
        ]);
    }

    public function sendSuccessResponse($message , $reset = true
        , $url = null , $dialog = true , $data = null): JsonResponse {
        return $this->sendResponse(true , $message , $reset, $url, $dialog, $data);
    }

    public function sendSuccessDialogResponse($message, $reset = true, $url = null,
                                                     $data = null): JsonResponse {
        return $this->sendResponse(true , $message , $reset, $url, true , $data);
    }

    public function sendSuccessNonDialogResponse($message, $reset = true, $url = null, $data = null): JsonResponse {
        return $this->sendResponse(true , $message , $reset, $url, false , $data);
    }
}
