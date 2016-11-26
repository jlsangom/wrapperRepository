<?php

namespace Infrastructure\Persistence\MySql;

use Domain\RepositoryInfrastructure;

class RepositoryMySql implements RepositoryInfrastructure
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function findById($id)
    {
    }

    public function findByCriteria($criteria)
    {
    }

    public function persist($entity)
    {
    }
}
