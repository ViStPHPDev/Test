<?php

namespace App\Garage\Domain\Exception;

class FuelTypeNotSupportedException extends AbstractGarageException
{
    public function __construct()
    {
        parent::__construct(
            "Fuel type is not supported",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}