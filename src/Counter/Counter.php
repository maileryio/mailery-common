<?php

namespace Mailery\Common\Counter;

use Predis\Client as RedisClient;

class Counter
{
    /**
     * @var string
     */
    private string $key;

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
     * @return self
     */
    public function withKey(string $key): self
    {
        $new = clone $this;
        $new->key = $key;

        return $new;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->client->get($this->key) ?? 0;
    }

    /**
     * @param int $amount
     * @return bool
     */
    public function set(int $amount = 0): bool
    {
        return $this->client->set($this->key, $amount);
    }

    /**
     * @param int $amount
     * @return int
     */
    public function incr(int $amount = 1): int
    {
        return $this->client->incrby($this->key, $amount);
    }

    /**
     * @param int $amount
     * @return int
     */
    public function decr(int $amount = 1): int
    {
        return $this->client->decrby($this->key, $amount);
    }
}
