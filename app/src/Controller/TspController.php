<?php

namespace App\Controller;

use App\Service\TspService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TspController extends AbstractController
{
    public function __construct(private TspService $tspService)
    {
    }

    #[Route('/', name: 'app')]
    public function getAllTsp(): JsonResponse
    {
        $allTsp = $this->tspService->getAllTsp();
        return $this->json($allTsp);
    }
}
