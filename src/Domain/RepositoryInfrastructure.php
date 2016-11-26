<?php

namespace Domain;

interface RepositoryInfrastructure
{
    public function findById($id);
    public function findByCriteria($criteria);
}
