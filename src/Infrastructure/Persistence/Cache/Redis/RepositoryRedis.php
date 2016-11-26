<?php

namespace Infrastructure\Persistence\Cache\Redis;

use Domain\RepositoryInfrastructureCache;

class RepositoryRedis implements RepositoryInfrastructureCache
{
    protected $clientRedis;

    public function __construct($clientRedis)
    {
        $this->clientRedis = $clientRedis;
    }

    public function get($key)
    {
        return $this->clientRedis->get($key);
    }

    public function set($key, $value, $ttl)
    {
        return $this->clientRedis->set($key, $value, $ttl);
    }
}
