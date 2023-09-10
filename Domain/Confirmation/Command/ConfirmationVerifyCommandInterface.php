<?php

namespace Command;

use Domain\User\User;
use UseCase\ConfirmationMethod;

interface ConfirmationVerifyCommandInterface
{
    public function handle(ConfirmationMethod $confirmation, User $user, int $code): bool;
}