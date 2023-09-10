<?php

namespace Entity;
interface ConfirmationEntityInterface
{
    public function getCode(): int;

    public function isExpired(): bool;

    public function isUsed(): bool;
}