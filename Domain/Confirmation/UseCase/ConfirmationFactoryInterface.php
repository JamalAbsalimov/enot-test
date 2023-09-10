<?php

namespace UseCase;

interface ConfirmationFactoryInterface
{
    public function create(string $method): ConfirmationMethod;
}