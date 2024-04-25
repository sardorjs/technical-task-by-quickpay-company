<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\UserSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function change(Request $request)
    {
        // Ваша логика изменения настроек
        return response()->json(['message' => 'Setting change request received']);
    }

    public function confirm(Request $request)
    {
        // Ваша логика подтверждения настроек
        return response()->json(['message' => 'Setting confirmation received']);
    }
}
