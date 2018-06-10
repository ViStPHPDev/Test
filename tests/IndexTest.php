<?php

namespace App\Test;

use App\Controller\AppController;
use App\Cargo\Infrastructure\Web\Service\CargoService as Cargo;
use App\Fuel\Infrastructure\Web\Service\FuelService as Fuel;
use App\Garage\Infrastructure\Web\Service\GarageService as Garage;
use App\Service\GarageService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class IndexTest
 * @package App\Garage\Infrastructure\Test
 */
class IndexTest extends WebTestCase
{
    public function testIndexController()
    {
        $client = static::createClient();
        $client->request("GET", '/');
        $response = $client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }
}
