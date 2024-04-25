<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ChangeSettingRequest;
use App\Http\Requests\API\V1\ConfirmSettingRequest;
use App\UseCases\API\V1\ChangeSettingUseCase;
use App\UseCases\API\V1\ConfirmSettingUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * @param ChangeSettingRequest $request
     * @param ChangeSettingUseCase $changeSettingUseCase
     * @return JsonResponse
     */
    public function change(ChangeSettingRequest $request, ChangeSettingUseCase $changeSettingUseCase): JsonResponse
    {
        $response = $changeSettingUseCase->execute($request);

        // Ваша логика изменения настроек
        return response()->json($response);
    }

    /**
     * @param ConfirmSettingRequest $request
     * @param ConfirmSettingUseCase $confirmSettingUseCase
     * @return JsonResponse
     */
    public function confirm(ConfirmSettingRequest $request, ConfirmSettingUseCase $confirmSettingUseCase): JsonResponse
    {

        $response = $confirmSettingUseCase->execute($request);

        // Ваша логика подтверждения настроек
        return response()->json($response);
    }
}
