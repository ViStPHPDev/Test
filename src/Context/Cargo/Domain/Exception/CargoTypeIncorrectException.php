<?php

namespace App\Cargo\Domain\Exception;

class CargoTypeIncorrectException extends AbstractCargoException
{
    public function __construct()
    {
        parent::__construct(
            "Cargo type is incorrect",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}