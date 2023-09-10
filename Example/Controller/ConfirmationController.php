<?php

namespace Example\Controller;

use Command\ConfirmationCommandInterface;
use Command\ConfirmationVerifyCommandInterface;
use Domain\User\Repository\UserRepositoryInterface;
use UseCase\ConfirmationFactoryInterface;

class ConfirmationController
{

    public function __construct(
        protected ConfirmationFactoryInterface $factory
    )
    {
    }

    public function sendCode(ChangeSettingRequest $request, UserRepositoryInterface $userRepository, ConfirmationCommandInterface $command)
    {
        $confirmationMethodFactory = $this->factory->create($request['confirm_method']);

        $user = $userRepository->findById($request['user_id']);

        $command->handle($user, $confirmationMethodFactory);

        return response()->json(['message' => 'Code sent successfully'], 200);
    }

    public function verifyCode(VerifyCodeRequest $request, UserRepositoryInterface $userRepository, ConfirmationVerifyCommandInterface $command)
    {
        $confirmationMethodFactory = $this->factory->create($request['confirm_method']);

        $user = $userRepository->findById($request['user_id']);

        $isVerify = $command->handle($confirmationMethodFactory, $user, $request['code']);

        if (!$isVerify) {
            // Неправильный код
            return response()->json(['message' => 'Invalid code'], 400);
        }

        // Код подтвержден успешно
        // Выполните необходимые действия по изменению настройки пользователя
        return response()->json(['message' => 'Code verified successfully'], 200);
    }
}