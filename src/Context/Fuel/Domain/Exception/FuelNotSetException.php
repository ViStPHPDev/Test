<?php

namespace App\Fuel\Domain\Exception;

class FuelNotSetException extends AbstractFuelException
{
    public function __construct()
    {
        parent::__construct(
            "Fuel for management is not set",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}