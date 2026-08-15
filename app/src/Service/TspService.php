<?php

namespace App\Service;

use App\Entity\Tsp;
use App\Repository\TspRepository;

class TspService
{
    public function __construct(private TspRepository $tspRepository)
    {
    }

    public function getAllTsp(): array
    {
        $array = $this->tspRepository->findAll();
        return $this->setLastNameToUpper($array);
    }

    private function setLastNameToUpper(array $array): array {
        foreach ($array as $tsp) {
            $tsp->setLastName(strtoupper($tsp->getLastName()));
        }
        return $array;
    }
}
