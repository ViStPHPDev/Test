<?php

namespace App\Cargo\Domain\Exception;

class CargoNotSetException extends AbstractCargoException
{
    public function __construct()
    {
        parent::__construct(
            "Cargo for management is not set",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}