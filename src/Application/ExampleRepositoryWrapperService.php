<?php

namespace Application;

use Infrastructure\Persistence\Cache\Dummy\RepositoryDummy;
use Infrastructure\Persistence\Cache\MemCached\RepositoryMemCached;
use Infrastructure\Persistence\Cache\Redis\RepositoryRedis;
use Infrastructure\Persistence\ElasticSearch\RepositoryElasticSearch;
use Infrastructure\Persistence\MySql\RepositoryMySql;
use Infrastructure\Persistence\WrapperRepository;

class ExampleRepositoryWrapperService
{
    public function exampleElasticAndNotCachedLayer()
    {
        $wrapperRepository = new WrapperRepository(
            new RepositoryElasticSearch(
                'conecctionElastic'
            ),
            new RepositoryDummy()
        );

        $resultCriteria = $wrapperRepository
            ->setTtl(3600)
            ->findByCriteria('criteria');

        $resultId = $wrapperRepository
            ->setTtl(7200)
            ->findByCriteria('id');
    }

    public function exampleElasticAndMemCached()
    {
        $wrapperRepository = new WrapperRepository(
            new RepositoryElasticSearch(
                'conecctionElastic'
            ),
            new RepositoryMemCached(
                'connectionMemCached'
            )
        );

        $resultCriteria = $wrapperRepository
            ->setTtl(3600)
            ->findByCriteria('criteria');

        $resultId = $wrapperRepository
            ->setTtl(7200)
            ->findByCriteria('id');

        // ttl = 0 it's the same as not caching
        $resultNotCache = $wrapperRepository
            ->setTtl(0)
            ->findByCriteria('id');

    }

    public function exampleMySqlAndRedis()
    {
        $wrapperRepository = new WrapperRepository(
            new RepositoryMySql(
                'connectionMysql'
            ),
            new RepositoryRedis(
                'connectionRedis'
            )
        );

        $resultCriteria = $wrapperRepository
            ->setTtl(900)
            ->findByCriteria('criteria');

        $resultId = $wrapperRepository
            ->setTtl(1800)
            ->findByCriteria('id');

        // ttl = 0 it's the same as not caching
        $resultNotCache = $wrapperRepository
            ->setTtl(0)
            ->findByCriteria('id');
    }

}