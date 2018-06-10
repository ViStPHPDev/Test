<?php

namespace App\Fuel\Infrastructure\Test;

use App\Fuel\Domain\Exception\FuelTypeIncorrectException;
use App\Fuel\Domain\Factory\FuelFactory;
use App\Fuel\Domain\Model\Gas\Gas;
use App\Fuel\Domain\Model\Gas\GasManager;
use PHPUnit\Framework\TestCase;

/**
 * Class GasTest
 * @package App\Fuel\Infrastructure\Test
 */
class GasTest extends TestCase
{
    public function testFuelTypeIncorrectException()
    {
        $this->expectException(FuelTypeIncorrectException::class);
        $gas = FuelFactory::create('Avgas', 'Avgas');
    }

    public function testCreateGasWithFactory()
    {
        $gas = FuelFactory::create(FuelFactory::GAS, 'Gas');
        $this->assertSame('Gas', $gas->getName());
        return $gas;
    }

    /**
     * @depends testCreateGasWithFactory
     * @param Gas $gas
     * @return GasManager
     */
    public function testCreateGasManager(Gas $gas)
    {
        /** @var GasManager $manager */
        $manager = $gas->getManager();
        $this->assertInstanceOf(GasManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreateGasManager
     * @param GasManager $manager
     */
    public function testMethodGetFuel(GasManager $manager)
    {
        $fuel = $manager->getFuel();
        $this->assertInstanceOf(Gas::class, $fuel);
    }
}
