<?php

namespace App\Fuel\Domain\Exception;

class ClassManagerMethodNotFoundException extends AbstractFuelException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager method not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}