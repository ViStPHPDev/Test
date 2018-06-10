<?php

namespace App\Fuel\Domain\Exception;

class ClassManagerFaultException extends AbstractFuelException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager fault",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}