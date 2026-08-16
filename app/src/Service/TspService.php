<?php

namespace App\Service;

use App\DTO\TspDTO;
use App\Entity\Tsp;
use App\Repository\TspRepository;

class TspService
{
    public function __construct(private TspRepository $tspRepository)
    {
    }

    public function getAllTsp(): array {
        $allTsp = $this->tspRepository->findAll();
        $allTspWithLastnameInUpperCase = $this->setLastNameToUpper($allTsp);
        return $this->mapToDtos($allTspWithLastnameInUpperCase);
    }

    private function setLastNameToUpper(array $array): array {
        foreach ($array as $tsp) {
            $tsp->setLastName(strtoupper($tsp->getLastName()));
        }
        return $array;
    }

    private function getTspDTO(Tsp $tsp): TspDTO {
        return new TspDTO($tsp->getFirstName(), $tsp->getLastName());
    }

    private function mapToDtos(array $array): array {
        $allTspDTO = [];
        foreach ($array as $tsp) {
            $tspDTO = $this->getTspDTO($tsp);
            $allTspDTO[] = $tspDTO;
        }
        return $allTspDTO;
    }
}
