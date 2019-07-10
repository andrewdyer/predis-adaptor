<?php

namespace Anddye\PredisAdaptor;

use Predis\Client as Predis;

/**
 * Class Cache.
 *
 * @author Andrew Dyer <andrewdyer@outlook.com>
 */
class Cache
{
    /** @var Predis */
    protected $client;

    /** @var string */
    protected $host = '127.0.0.1';

    /** @var string */
    protected $password = null;

    /** @var string */
    protected $port = '6379';

    /** @var string */
    protected $scheme = 'tcp';

    /**
     * @param array $settings optional
     */
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

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function __get(string $key)
    {
        return $this->get($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function __isset(string $key)
    {
        return $this->exists($key);
    }

    /*
     * @param string $key
     * @param mixed  $value
     *
     * @return type
     */

    public function __set(string $key, $value)
    {
        return $this->put($key, $value);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function __unset(string $key)
    {
        return $this->delete($key);
    }

    /**
     * @return Predis
     */
    public function client(): Predis
    {
        return $this->client;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key): bool
    {
        return (bool) $this->client->del($key);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function exists(string $key): bool
    {
        return (bool) $this->client->exists($key);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->client->get($key);
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param int    $minutes optional
     *
     * @return type
     */
    public function put(string $key, $value, int $minutes = 10)
    {
        return $this->client->setex($key, (int) $minutes * 60, $value);
    }

    /**
     * @param string   $key
     * @param int      $minutes
     * @param callable $callback
     *
     * @return mixed
     */
    public function remember(string $key, int $minutes, callable $callback)
    {
        if (!$value = $this->get($key)) {
            $this->put($key, $value = $callback(), $minutes);
        }

        return $value;
    }
}
