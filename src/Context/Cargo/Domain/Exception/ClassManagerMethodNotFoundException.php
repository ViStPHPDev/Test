<?php

namespace App\Cargo\Domain\Exception;

class ClassManagerMethodNotFoundException extends AbstractCargoException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager method not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}