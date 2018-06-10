<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Application\GarageManagerFactory;
use App\Garage\Application\GarageManagerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class GarageManagerTest
 * @package App\Garage\Infrastructure\Test
 */
class GarageManagerTest extends TestCase
{
    public function testCreateGarageManagerWithFactory()
    {
        $garage = GarageManagerFactory::create();
        $this->assertInstanceOf(GarageManagerInterface::class, $garage);
        return $garage;
    }

    /**
     * @depends testCreateGarageManagerWithFactory
     * @param GarageManagerInterface $garage
     */
    public function testCountVehicle(GarageManagerInterface $garage)
    {
        $this->assertEquals(0, $garage->getVehicles()->count());
    }
}
