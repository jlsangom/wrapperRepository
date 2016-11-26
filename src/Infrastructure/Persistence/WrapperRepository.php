<?php

namespace Infrastructure\Persistence;

use Domain\RepositoryInfrastructure;
use Domain\RepositoryInfrastructureCache;

class WrapperRepository implements RepositoryInfrastructure
{
    const PREFIX_KEY = 'PREFIX_';

    protected $repositoryPersistence;
    protected $repositoryCache;
    protected $ttl;

    /**
     * wrapperRepository constructor.
     * @param RepositoryInfrastructure $repositoryPersistence
     * @param RepositoryInfrastructureCache $repositoryCache
     */
    public function __construct(RepositoryInfrastructure $repositoryPersistence, RepositoryInfrastructureCache $repositoryCache)
    {
        $this->repositoryPersistence = $repositoryPersistence;
        $this->repositoryCache = $repositoryCache;
    }
    
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
        
        return $this;
    }

    public function findById($id)
    {
        $key = $this->createKey($id);

        if ($result = $this->repositoryCache->get($key)) {
            return $result;
        }

        $result = $this->repositoryPersistence->findById($id);

        if ($this->ttl > 0) {
            $this->repositoryCache->set($key, $result, $this->ttl);
        }

        return $result;

    }

    public function findByCriteria($criteria)
    {
        $key = $this->createKey($criteria);

        if ($result = $this->repositoryCache->get($key)) {
            return $result;
        }

        $result = $this->repositoryPersistence->findByCriteria($criteria);

        if ($this->ttl > 0) {
            $this->repositoryCache->set($key, $result, $this->ttl);
        }

        return $result;
    }

    private function createKey($idKey)
    {
        return static::PREFIX_KEY.md5($idKey);
    }
}
