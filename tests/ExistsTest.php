<?php

use Anddye\PredisAdaptor;
use PHPUnit\Framework\TestCase;

/**
 * Class ExistsTest.
 *
 * @author Andrew Dyer <andrewdyer@outlook.com>
 *
 * @see https://github.com/andrewdyer/predis-adaptor
 */
class ExistsTest extends TestCase
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
     * Check if an valid key exists.
     */
    public function testValidKeyExists()
    {
        $this->assertTrue($this->cache->exists('validKey'));
    }

    /**
     * Check if an valid key exists using magic methods.
     */
    public function testValidKeyExistsShorthand()
    {
        $this->assertTrue(isset($this->cache->validKey));
    }

    /**
     * Check if an invalid key exists.
     */
    public function testInvalidKeyExists()
    {
        $this->assertFalse($this->cache->exists('invalidKey'));
    }

    /**
     * Check if an invalid key exists using magic methods.
     */
    public function testInvalidKeyExistsShorthand()
    {
        $this->assertFalse(isset($this->cache->invalidKey));
    }
}
