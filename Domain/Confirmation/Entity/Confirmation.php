<?php

namespace Entity;

use Domain\Common\Entity;

class Confirmation extends Entity implements \Entity\ConfirmationEntityInterface
{
    /**
     * @return int
     */
    public function getCode(): int
    {
        return rand(1111, 9999);
    }

    public function isExpired(): bool
    {
        return false;
    }


    public function isUsed(): bool
    {
        return true;
    }
}