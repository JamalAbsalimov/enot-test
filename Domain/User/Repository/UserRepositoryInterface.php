<?php

namespace Domain\User\Repository;

use Domain\User\User;

interface UserRepositoryInterface
{
    public function findByTg(int $telegramId): User;

    public function findByEmail(string $email): User;

    public function findByPhone(string $phone): User;

    public function findById(int $id): User;
}