<?php

namespace Example\Confirmation;

use Domain\User\User;

class SmsConfirmationMethod extends \UseCase\ConfirmationMethod
{
    public const NAME = 'sms';

    public function __construct(
        private SmsSenderInteface $sms,
    )
    {
    }

    public function sendCode(User $user): int
    {
        $code = $this->generateCode();
        $this->sms->send($user->getPhone(), $code);

        return $code;
    }
}