<?php

namespace Domain\Common;

abstract class Entity
{
    public function getPrimaryKey(): int
    {
        return 1;
    }
}