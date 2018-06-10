<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\Land\Car\Car;
use App\Garage\Domain\Model\Vehicle\Land\Car\CarManager;
use PHPUnit\Framework\TestCase;

/**
 * Class CarTest
 * @package App\Garage\Infrastructure\Test
 */
class CarTest extends TestCase
{
    public function testCreateCarWithFactory()
    {
        $car = VehicleFactory::create(VehicleFactory::LAND_CAR, 'Car');
        $this->assertSame('Car', $car->getName());
        return $car;
    }

    /**
     * @depends testCreateCarWithFactory
     * @param Car $car
     * @return CarManager
     */
    public function testCreateCarManager(Car $car)
    {
        /** @var CarManager $manager */
        $manager = $car->getManager();
        $this->assertInstanceOf(CarManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreateCarManager
     * @param CarManager $manager
     */
    public function testMethodMusicOn(CarManager $manager)
    {
        $music = $manager->musicOn();
        $this->assertStringStartsWith('Car', $music);
    }
}
