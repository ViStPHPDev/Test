<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\Air\Helicopter\Helicopter;
use App\Garage\Domain\Model\Vehicle\Air\Helicopter\HelicopterManager;
use PHPUnit\Framework\TestCase;

/**
 * Class HelicopterTest
 * @package App\Garage\Infrastructure\Test
 */
class HelicopterTest extends TestCase
{
    public function testCreateHelicopterWithFactory()
    {
        $helicopter = VehicleFactory::create(VehicleFactory::AIR_HELICOPTER, 'Helicopter');
        $this->assertSame('Helicopter', $helicopter->getName());
        return $helicopter;
    }

    /**
     * @depends testCreateHelicopterWithFactory
     * @param Helicopter $helicopter
     * @return HelicopterManager
     */
    public function testCreateHelicopterManager(Helicopter $helicopter)
    {
        /** @var HelicopterManager $manager */
        $manager = $helicopter->getManager();
        $this->assertInstanceOf(HelicopterManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreateHelicopterManager
     * @param HelicopterManager $manager
     */
    public function testMethodFly(HelicopterManager $manager)
    {
        $fly = $manager->fly();
        $this->assertStringStartsWith('Helicopter', $fly);
    }
}
