<?php

namespace App\Cargo\Infrastructure\Test;

use App\Cargo\Domain\Exception\CargoTypeIncorrectException;
use App\Cargo\Domain\Factory\CargoFactory;
use App\Cargo\Domain\Model\Bulk\Bulk;
use App\Cargo\Domain\Model\Bulk\BulkManager;
use PHPUnit\Framework\TestCase;

/**
 * Class BulkTest
 * @package App\Cargo\Infrastructure\Test
 */
class BulkTest extends TestCase
{
    public function testCargoTypeIncorrectException()
    {
        $this->expectException(CargoTypeIncorrectException::class);
        $bulk = CargoFactory::create('Liquid', 'Liquid');
    }

    public function testCreateBulkWithFactory()
    {
        $bulk = CargoFactory::create(CargoFactory::BULK, 'Bulk');
        $this->assertSame('Bulk', $bulk->getName());
        return $bulk;
    }

    /**
     * @depends testCreateBulkWithFactory
     * @param Bulk $bulk
     * @return BulkManager
     */
    public function testCreateBulkManager(Bulk $bulk)
    {
        /** @var BulkManager $manager */
        $manager = $bulk->getManager();
        $this->assertInstanceOf(BulkManager::class, $manager);
        return $manager;
    }

    /**
     * @depends testCreateBulkManager
     * @param BulkManager $manager
     */
    public function testMethodGetCargo(BulkManager $manager)
    {
        $fuel = $manager->getCargo();
        $this->assertInstanceOf(Bulk::class, $fuel);
    }
}
