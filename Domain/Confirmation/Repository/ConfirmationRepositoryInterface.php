<?php

namespace Repository;

use Entity\Confirmation;

interface ConfirmationRepositoryInterface
{
    public function findByCode(int $code): Confirmation;

    public function findByUserId(int $userId): Confirmation;


    public function find(array $where = []): Confirmation;


    public function create(array $params): Confirmation;
}