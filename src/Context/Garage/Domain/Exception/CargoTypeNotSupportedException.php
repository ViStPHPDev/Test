<?php

namespace App\Garage\Domain\Exception;

class CargoTypeNotSupportedException extends AbstractGarageException
{
    public function __construct()
    {
        parent::__construct(
            "Cargo type is not supported",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}