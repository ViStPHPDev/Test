<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Exception\VehicleTypeIncorrectException;
use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\Water\Boat\Boat;
use App\Garage\Domain\Model\Vehicle\Water\Boat\BoatManager;
use PHPUnit\Framework\TestCase;

/**
 * Class BoatTest
 * @package App\Garage\Infrastructure\Test
 */
class BoatTest extends TestCase
{
    public function testVehicleTypeIncorrectException()
    {
        $this->expectException(VehicleTypeIncorrectException::class);
        $boat = VehicleFactory::create('Chopper', 'Chopper');
    }

    public function testCreateBoatWithFactory()
    {
        $boat = VehicleFactory::create(VehicleFactory::WATER_BOAT, 'Boat');
        $this->assertSame('Boat', $boat->getName());
        return $boat;
    }

    /**
     * @depends testCreateBoatWithFactory
     * @param Boat $boat
     * @return BoatManager
     */
    public function testCreateBoatManager(Boat $boat)
    {
        /** @var BoatManager $manager */
        $manager = $boat->getManager();
        $this->assertInstanceOf(BoatManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreateBoatManager
     * @param BoatManager $manager
     */
    public function testMethodSwim(BoatManager $manager)
    {
        $swim = $manager->swim();
        $this->assertStringStartsWith('Boat', $swim);
    }
}
