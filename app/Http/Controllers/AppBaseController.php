<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;

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
    public function sendSuccessResponse($message, $reset = true
        ,                               $url = null, $dialog = true, $data = null): JsonResponse
    {
        return $this->sendResponse(true, $message, $reset, $url, $dialog, $data);
    }

    public function sendResponse($success, $message = null, $reset = true
        ,                        $url = null, $dialog = true, $data = null): JsonResponse
    {
        return response()->json([
            'success' => $success, 'message' => $message, 'reset' => $reset,
            'reset' => $reset, 'url' => $url, 'data' => $data, 'dialog' => $dialog
        ]);
    }

    public function sendSuccessDialogResponse($message, $reset = true, $url = null,
                                              $data = null): JsonResponse
    {
        return $this->sendResponse(true, $message, $reset, $url, true, $data);
    }

    public function sendSuccessNonDialogResponse($message, $reset = true, $url = null, $data = null): JsonResponse
    {
        return $this->sendResponse(true, $message, $reset, $url, false, $data);
    }

    protected function attachFiles(array &$inputs)
    {
        foreach ($inputs as $fieldName => $input) {
            if ($input instanceof UploadedFile) {
                $inputs[$fieldName] = str_replace('public', 'storage', $input->store('public/uploads'));
            }
        }
    }
}
