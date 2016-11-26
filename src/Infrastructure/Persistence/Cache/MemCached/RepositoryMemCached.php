<?php

namespace Infrastructure\Persistence\Cache\MemCached;

use Domain\RepositoryInfrastructureCache;

class RepositoryMemCached implements RepositoryInfrastructureCache
{
    protected $clientMemCached;

    public function __construct($clientMemCached)
    {
        $this->clientMemCached = $clientMemCached;
    }

    public function get($key)
    {
        return $this->clientMemCached->get($key);
    }

    public function set($key, $value, $ttl)
    {
        return $this->clientMemCached->set($key, $value, $ttl);
    }
}
