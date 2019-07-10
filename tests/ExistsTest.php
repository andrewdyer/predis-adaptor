<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

/**
 * Class ExistsTest.
 *
 * @author Andrew Dyer <andrewdyer@outlook.com>
 */
class ExistsTest extends TestCase
{
    /** @var Cache */
    protected $cache;

    /**
     * Set Up.
     */
    protected function setUp()
    {
        $this->cache = new Cache();
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
