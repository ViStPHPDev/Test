<?php

namespace App\Cargo\Domain\Exception;

class ClassManagerNotFoundException extends AbstractCargoException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}