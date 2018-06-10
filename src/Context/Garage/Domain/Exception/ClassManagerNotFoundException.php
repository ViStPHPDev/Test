<?php

namespace App\Garage\Domain\Exception;

class ClassManagerNotFoundException extends AbstractGarageException
{
    public function __construct()
    {
        parent::__construct(
            "Class manager not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}