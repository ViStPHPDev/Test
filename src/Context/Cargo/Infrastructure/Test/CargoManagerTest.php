<?php

namespace App\Cargo\Infrastructure\Test;

use App\Cargo\Application\CargoManagerFactory;
use App\Cargo\Application\CargoManagerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class CargoManagerTest
 * @package App\Cargo\Infrastructure\Test
 */
class CargoManagerTest extends TestCase
{
    public function testCreateCargoManagerWithFactory()
    {
        $cargo = CargoManagerFactory::create();
        $this->assertInstanceOf(CargoManagerInterface::class, $cargo);
        return $cargo;
    }

    /**
     * @depends testCreateCargoManagerWithFactory
     * @param CargoManagerInterface $cargo
     */
    public function testCountCargo(CargoManagerInterface $cargo)
    {
        $this->assertEquals(0, $cargo->getCargo()->count());
    }
}
