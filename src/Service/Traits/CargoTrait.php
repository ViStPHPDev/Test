<?php

namespace App\Service\Traits;

use App\Cargo\Infrastructure\Web\Service\CargoService as Cargo;

/**
 * Trait CargoTrait
 * @package App\Service\Traits
 */
trait CargoTrait
{
    /** @var  Cargo */
    protected $cargo;

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     */
    public function setCargo(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }
}