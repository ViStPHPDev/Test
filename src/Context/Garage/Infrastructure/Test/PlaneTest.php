<?php

namespace App\Garage\Infrastructure\Test;

use App\Fuel\Infrastructure\Web\Service\FuelService as Fuel;
use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\Air\Plane\Plane;
use App\Garage\Domain\Model\Vehicle\Air\Plane\PlaneManager;
use App\Garage\Infrastructure\Web\Service\GarageService;
use PHPUnit\Framework\TestCase;

/**
 * Class PlaneTest
 * @package App\Garage\Infrastructure\Test
 */
class PlaneTest extends TestCase
{
    public function testCreatePlaneWithFactory()
    {
        $plane = VehicleFactory::create(VehicleFactory::AIR_PLANE, 'Plane');
        $this->assertSame('Plane', $plane->getName());
        return $plane;
    }

    /**
     * @depends testCreatePlaneWithFactory
     * @param Plane $plane
     * @return PlaneManager
     */
    public function testCreatePlaneManager(Plane $plane)
    {
        /** @var PlaneManager $manager */
        $manager = $plane->getManager();
        $this->assertInstanceOf(PlaneManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreatePlaneManager
     * @param PlaneManager $manager
     */
    public function testMethodRefuel(PlaneManager $manager)
    {
        $garage = new GarageService();
        $gas = $garage->mergeFuel((new Fuel())->getGas());
        $result = $manager->refuel($gas);
        $this->assertStringStartsWith('Plane', $result);
    }
}
