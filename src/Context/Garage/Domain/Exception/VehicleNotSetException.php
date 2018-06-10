<?php

namespace App\Garage\Domain\Exception;

class VehicleNotSetException extends AbstractGarageException
{
    public function __construct()
    {
        parent::__construct(
            "Vehicle for management is not set",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}