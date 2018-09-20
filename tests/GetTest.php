<?php

use Anddye\PredisAdaptor;
use PHPUnit\Framework\TestCase;

/**
 * Class GetTest.
 *
 * @author Andrew Dyer <andrewdyer@outlook.com>
 *
 * @see https://github.com/andrewdyer/predis-adaptor
 */
class GetTest extends TestCase
{
    /** @var PredisAdaptor */
    protected $cache;

    /**
     * Set Up.
     */
    protected function setUp()
    {
        $this->cache = new PredisAdaptor();
        $this->cache->client()->flushall();
        $this->cache->put('validKey', 'my_value');
    }

    /**
     * Get a value.
     */
    public function testGet()
    {
        $this->assertEquals($this->cache->get('validKey'), 'my_value');
    }

    /**
     * Get a value using magic methods.
     */
    public function testGetShorthand()
    {
        $this->assertEquals($this->cache->validKey, 'my_value');
    }

    /**
     * Get a value or set it.
     */
    public function testRememberGet()
    {
        $value = $this->cache->remember('validKey', 10, function () {
            return 'my_value';
        });

        $this->assertEquals($value, 'my_value');
    }
}
