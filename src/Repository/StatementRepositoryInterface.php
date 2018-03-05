<?php
declare(strict_types = 1);
namespace TCCP\Repository;


interface StatementRepositoryInterface
{
    public function all(string $dateStart, string $dateEnd, int $userId): array;
}