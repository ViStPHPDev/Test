<?php

namespace App\Cargo\Domain\Exception;

class ClassManagerFaultException extends AbstractCargoException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager fault",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}