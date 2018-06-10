<?php

namespace App\Fuel\Infrastructure\Test;

use App\Fuel\Application\FuelManagerFactory;
use App\Fuel\Application\FuelManagerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class FuelManagerTest
 * @package App\Fuel\Infrastructure\Test
 */
class FuelManagerTest extends TestCase
{
    public function testCreateFuelManagerWithFactory()
    {
        $fuel = FuelManagerFactory::create();
        $this->assertInstanceOf(FuelManagerInterface::class, $fuel);
        return $fuel;
    }

    /**
     * @depends testCreateFuelManagerWithFactory
     * @param FuelManagerInterface $fuel
     */
    public function testCountFuel(FuelManagerInterface $fuel)
    {
        $this->assertEquals(0, $fuel->getFuels()->count());
    }
}
