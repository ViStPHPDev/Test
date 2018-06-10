<?php

namespace App\Garage\Domain\Exception;

class ClassManagerFaultException extends AbstractGarageException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager fault",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}