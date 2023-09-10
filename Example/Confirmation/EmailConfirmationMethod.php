<?php

namespace Example\Confirmation;

use UseCase\ConfirmationMethod;

class EmailConfirmationMethod extends ConfirmationMethod
{
    public const NAME = 'email';

    public function __construct(
        private MailerInterface $mailer,
    )
    {
    }

    public function sendCode($user): int
    {
        // Отправить SMS с уникальным кодом пользователю

        $code = $this->generateCode();
        $this->mailer->send('action-confirmation', $user->email, $code);

        return $code;
    }

}