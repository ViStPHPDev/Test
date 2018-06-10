<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\Land\Motorcycle\Motorcycle;
use App\Garage\Domain\Model\Vehicle\Land\Motorcycle\MotorcycleManager;
use PHPUnit\Framework\TestCase;

/**
 * Class MotorcycleTest
 * @package App\Garage\Infrastructure\Test
 */
class MotorcycleTest extends TestCase
{
    public function testCreateMotorcycleWithFactory()
    {
        $motorcycle = VehicleFactory::create(VehicleFactory::LAND_MOTORCYCLE, 'Motorcycle');
        $this->assertSame('Motorcycle', $motorcycle->getName());
        return $motorcycle;
    }

    /**
     * @depends testCreateMotorcycleWithFactory
     * @param Motorcycle $motorcycle
     * @return MotorcycleManager
     */
    public function testCreateMotorcycleManager(Motorcycle $motorcycle)
    {
        /** @var MotorcycleManager $manager */
        $manager = $motorcycle->getManager();
        $this->assertInstanceOf(MotorcycleManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreateMotorcycleManager
     * @param MotorcycleManager $manager
     */
    public function testMethodMove(MotorcycleManager $manager)
    {
        $move = $manager->move();
        $this->assertStringStartsWith('Motorcycle', $move);
    }
}
