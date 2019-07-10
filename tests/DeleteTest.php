<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

/**
 * Class DeleteTest.
 *
 * @author Andrew Dyer <andrewdyer@outlook.com>
 */
class DeleteTest extends TestCase
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
     * Delete an valid key.
     */
    public function testDeleteValidKey()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        $this->cache->delete('validKey');

        $this->assertFalse($this->cache->exists('validKey'));
    }

    /**
     * Delete an valid key using magic methods.
     */
    public function testDeleteValidKeyShorthand()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        unset($this->cache->validKey);

        $this->assertFalse($this->cache->exists('validKey'));
    }

    /**
     * Delete an invalid key.
     */
    public function testDeleteInvalidKey()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        $this->cache->delete('invalidKey');

        $this->assertTrue($this->cache->exists('validKey'));
    }

    /**
     * Delete an invalid key using magic methods.
     */
    public function testDeleteInvalidKeyShorthand()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        unset($this->cache->invalidKey);

        $this->assertTrue($this->cache->exists('validKey'));
    }
}
