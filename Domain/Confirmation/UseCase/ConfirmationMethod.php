<?php

namespace UseCase;

use Domain\User\User;
use Entity\Confirmation;

abstract class ConfirmationMethod
{
    public function getName()
    {
        return static::NAME;
    }

    /**
     * @param User $user
     * @return int
     */
    abstract public function sendCode(User $user): int;

    /**
     * @param User $user
     * @param int $code
     * @return mixed
     */
    public function verifyCode(Confirmation $confirm, int $code): bool
    {
        if ($confirm->isExpired()) {
            throw new \RuntimeException('code expired');
        }

        if ($confirm->isUsed()) {
            throw new \RuntimeException('code is used');
        }

        return $confirm->getCode() === $code;
    }


    /**
     * @return mixed
     */
    public function generateCode(): int
    {
        // generate unique code
        return rand(1111, 9999);
    }
}