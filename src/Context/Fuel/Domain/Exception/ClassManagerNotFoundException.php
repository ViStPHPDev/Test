<?php

namespace App\Fuel\Domain\Exception;

class ClassManagerNotFoundException extends AbstractFuelException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}