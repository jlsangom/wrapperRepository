<?php

namespace Infrastructure\Persistence\ElasticSearch;

use Domain\RepositoryInfrastructure;

class RepositoryElasticSearch implements RepositoryInfrastructure
{
    protected $elasticClient;

    public function __construct($elasticClient)
    {
        $this->elasticClient = $elasticClient;
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
