<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

/**
 * Class PutTest.
 *
 * @author Andrew Dyer <andrewdyer@outlook.com>
 */
class PutTest extends TestCase
{
    /** @var Cache */
    protected $cache;

    /**
     * Set Up.
     */
    protected function setUp()
    {
        $this->cache = new Cache();
    }

    /**
     * Cache a value.
     */
    public function testPut()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');

        $this->assertTrue($this->cache->exists('validKey'));
    }

    /**
     * Cache a value using magic methods.
     */
    public function testPutShorthand()
    {
        $this->cache->client()->flushall();

        $this->cache->validKey = 'my_value';

        $this->assertTrue($this->cache->exists('validKey'));
    }
}
