<?php

namespace Example\Confirmation;

use InvalidArgumentException;
use UseCase\ConfirmationFactoryInterface;

/**
 * Simple Factory for detect confirmation factory
 */
class Factory implements ConfirmationFactoryInterface
{
    /**
     * @param string $method
     * @return SmsConfirmationMethod|TelegramConfirmationMethod|EmailConfirmationMethod
     */
    public function create(string $method): SmsConfirmationMethod|TelegramConfirmationMethod|EmailConfirmationMethod
    {
        return match ($method) {
            SmsConfirmationMethod::NAME => new SmsConfirmationMethod(/* DI set sms service client */),
            EmailConfirmationMethod::NAME => new EmailConfirmationMethod(/* DI set email service client */),
            TelegramConfirmationMethod::NAME => new TelegramConfirmationMethod(/* DI telegram client */),
            default => throw new InvalidArgumentException('Invalid confirmation method provided'),
        };
    }

}