<?php

namespace Mailery\Common\Counter;

use Predis\Client as RedisClient;

class CounterFactory
{
    /**
     * @var RedisClient
     */
    private RedisClient $client;

    /**
     * @param RedisClient $client
     */
    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $key
     * @return Counter
     */
    public function getCounter(string $key): Counter
    {
        return (new Counter($this->client))->withKey($key);
    }
}