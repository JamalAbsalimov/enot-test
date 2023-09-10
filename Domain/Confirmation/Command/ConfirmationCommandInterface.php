<?php

namespace Command;

use Domain\User\User;
use Entity\Confirmation;
use UseCase\ConfirmationMethod;

interface ConfirmationCommandInterface
{
    public function handle(User $user, ConfirmationMethod $confirmation): Confirmation;


}