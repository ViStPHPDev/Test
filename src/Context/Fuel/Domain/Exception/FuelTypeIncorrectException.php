<?php

namespace App\Fuel\Domain\Exception;

class FuelTypeIncorrectException extends AbstractFuelException
{
    public function __construct()
    {
        parent::__construct(
            "Fuel type is incorrect",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}