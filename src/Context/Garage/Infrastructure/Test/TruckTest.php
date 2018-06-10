<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\Land\Truck\Truck;
use App\Garage\Domain\Model\Vehicle\Land\Truck\TruckManager;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Cargo\Infrastructure\Web\Service\CargoService as Cargo;
use App\Garage\Infrastructure\Web\Service\GarageService;
use PHPUnit\Framework\TestCase;

class TruckTest extends TestCase
{
    /**
     * @return VehicleInterface
     */
    public function testCreateTruckWithFactory()
    {
        $truck = VehicleFactory::create(VehicleFactory::LAND_TRUCK, 'Truck');
        $this->assertSame('Truck', $truck->getName());
        return $truck;
    }

    /**
     * @depends testCreateTruckWithFactory
     * @param Truck $truck
     * @return TruckManager
     */
    public function testCreateTruckManager(Truck $truck)
    {
        /** @var TruckManager $manager */
        $manager = $truck->getManager();
        $this->assertInstanceOf(TruckManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreateTruckManager
     * @param TruckManager $manager
     */
    public function testMethodEmptyLoads(TruckManager $manager)
    {
        $garage = new GarageService();
        $cargo = $garage->mergeCargo((new Cargo())->getBulk());
        $result = $manager->emptyLoads($cargo);
        $this->assertStringStartsWith('Truck', $result);
    }
}
