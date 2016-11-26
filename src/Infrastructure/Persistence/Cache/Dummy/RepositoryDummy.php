<?php

namespace Infrastructure\Persistence\Cache\Dummy;

use Domain\RepositoryInfrastructureCache;

class RepositoryDummy implements RepositoryInfrastructureCache
{
    public function get($key)
    {
        return false;
    }

    public function set($key, $value, $ttl)
    {
        return false;
    }
}
