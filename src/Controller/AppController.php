<?php

namespace App\Controller;

use App\Service\GarageService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     * @param GarageService $garage
     * @return JsonResponse
     */
    public function index(GarageService $garage)
    {
        try {
            return $this->json($garage->garageTest());
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}