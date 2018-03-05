<?php


declare(strict_types = 1);
namespace TCCP\Repository;

use TCCP\Repository\RepositoryInterface;


interface CategoryCostRepositoryInterface extends RepositoryInterface
{
    public function sumByPeriod(string $dateStart, string $dateEnd, int $userId): array;
}