<?php

namespace App\UseCases\API\V1;


use App\Repositories\ConfirmationCodeRepositoryInterface;
use App\Contracts\NotificationInterface;
use App\Repositories\SettingsRepositoryInterface;
use App\Http\Requests\API\V1\ChangeSettingRequest;

class ChangeSettingUseCase
{
    public function __construct(
        private readonly SettingsRepositoryInterface $settingsRepo,
        private readonly ConfirmationCodeRepositoryInterface $confirmationCodeRepo,
        private readonly NotificationInterface $notificationService,
    ){}

    /**
     * @param ChangeSettingRequest $request
     * @return array[]
     */
    public function execute(ChangeSettingRequest $request): array
    {
        $user = $request->user();
        $setting = $this->settingsRepo->findByUserId($user->id)->first(); // предположим что мы нашли ту самую настройку

        if ($setting && $setting->value != $request->input('value')) {
            $code = rand(100000, 999999);
            $this->confirmationCodeRepo->create($user->id, $code, $request->input('method'));
            $this->notificationService->send($user->email, "Ваш код проверки: $code");

            return ['message' => "Код проверки отправлен. Ваш код проверки: $code"];
        }

        return ['message' => 'Данные одинаковые! Изменения не требуются'];
    }
}
