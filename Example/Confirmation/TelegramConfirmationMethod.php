<?php

namespace Example\Confirmation;

class TelegramConfirmationMethod extends \UseCase\ConfirmationMethod
{
    public const NAME = 'telegram';

    public function __construct(
        private TelegramClient $client
    )
    {
    }

    public function sendCode($user): int
    {
        $code = $this->generateCode();
        $this->client->sendMessage($user->getTelegramId(), $code);

        return $code;
    }
}