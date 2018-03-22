<?php
declare(strict_types=1);
namespace TCCP\Repository;


class RepositoryFactory
{
    public static function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }
}
