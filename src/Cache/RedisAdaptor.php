<?php

namespace Anddye\Cache;

use Predis\Client as Predis;

/**
 * Class RedisAdaptor.
 */
class RedisAdaptor
{
    /** @var Predis */
    protected $client;

    /** @var string */
    protected $host = '127.0.0.1';

    /** @var string */
    protected $password = '';

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
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->client->get($key);
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
