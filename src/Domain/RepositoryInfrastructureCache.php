<?php

namespace Domain;

interface RepositoryInfrastructureCache
{
    public function get($key);
    public function set($key, $value, $ttl);
}
