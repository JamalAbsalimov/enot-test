<?php

namespace Example\Command;

use Command\ConfirmationVerifyCommandInterface;
use Domain\User\User;
use Repository\ConfirmationRepositoryInterface;
use UseCase\ConfirmationMethod;

readonly class ConfirmationVerifyCommand implements ConfirmationVerifyCommandInterface
{

    public function __construct(
        private ConfirmationRepositoryInterface $repository
    )
    {
    }

    public function handle(ConfirmationMethod $confirmation, User $user, int $code): bool
    {
        $confirm = $this->repository->find(['user_id' => $user->getPrimaryKey(), 'code' => $code]);

        return $confirmation->verifyCode($confirm, $code);
    }
}