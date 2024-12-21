<?php

namespace Anddye\PredisAdaptor;

use Predis\Client as Predis;

class Cache
{
    protected $client;

    protected $host = '127.0.0.1';

    protected $password = null;

    protected $port = '6379';

    protected $scheme = 'tcp';

    public function __construct(array $settings = [])
    {
        foreach ($settings as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

        $this->client = new Predis([
            'host' => $this->host,
            'password' => $this->password,
            'port' => $this->port,
            'scheme' => $this->scheme,
        ]);
    }

    public function __get(string $key)
    {
        return $this->get($key);
    }

    public function __isset(string $key)
    {
        return $this->exists($key);
    }

    public function __set(string $key, $value)
    {
        return $this->put($key, $value);
    }

    public function __unset(string $key)
    {
        return $this->delete($key);
    }

    public function client(): Predis
    {
        return $this->client;
    }

    public function delete(string $key): bool
    {
        return (bool) $this->client->del($key);
    }

    public function exists(string $key): bool
    {
        return (bool) $this->client->exists($key);
    }

    public function get(string $key)
    {
        return $this->client->get($key);
    }

    public function put(string $key, $value, int $minutes = 10)
    {
        return $this->client->setex($key, (int) $minutes * 60, $value);
    }

    public function remember(string $key, int $minutes, callable $callback)
    {
        if (!$value = $this->get($key)) {
            $this->put($key, $value = $callback(), $minutes);
        }

        return $value;
    }
}
