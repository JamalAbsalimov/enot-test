<?php

namespace Example\Command;

use Command\ConfirmationCommandInterface;
use Domain\User\User;
use Entity\Confirmation;
use Repository\ConfirmationRepositoryInterface;
use UseCase\ConfirmationMethod;

readonly class ConfirmationCommand implements ConfirmationCommandInterface
{
    public function __construct(
        private ConfirmationRepositoryInterface $repository,
    )
    {
    }

    public function handle(User $user, ConfirmationMethod $confirmation): Confirmation
    {
        $code = $confirmation->sendCode($user);

        return $this->repository->create([
            'user_id' => $user,
            'method' => $confirmation->getName(),
            'code' => $code
        ]);
    }
}