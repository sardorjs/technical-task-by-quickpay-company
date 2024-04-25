<?php

namespace App\UseCases\API\V1;


use App\Http\Requests\API\V1\ConfirmSettingRequest;
use App\Repositories\ConfirmationCodeRepositoryInterface;
use App\Repositories\SettingsRepositoryInterface;

class ConfirmSettingUseCase
{
    public function __construct(
        private readonly SettingsRepositoryInterface $settingsRepo,
        private readonly ConfirmationCodeRepositoryInterface $confirmationCodeRepo,
    ){}

    /**
     * @param ConfirmSettingRequest $request
     * @return array[]
     */
    public function execute(ConfirmSettingRequest $request): array
    {
        $user = $request->user();
        if ($this->confirmationCodeRepo->verifyCode($user->id, $request->input('code'))) {
            $setting = $this->settingsRepo->findByUserId($user->id)->first(); // предположим, что это нужная настройка
            $newValue = $request->input('new_value');
            $setting->value = $newValue;
            $this->settingsRepo->update($setting);

            return ['message' => "Настройка успешно обновлена на $newValue. UserSettingId: ". $setting->id . " - UserId:" . $user->id];
        }

        return ['message' => 'Недействительный или просроченный код'];
    }
}
