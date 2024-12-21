<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

class DeleteTest extends TestCase
{
    protected $cache;

    protected function setUp(): void
    {
        $this->cache = new Cache();
    }

    public function testDeleteValidKey()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        $this->cache->delete('validKey');

        $this->assertFalse($this->cache->exists('validKey'));
    }

    public function testDeleteValidKeyShorthand()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        unset($this->cache->validKey);

        $this->assertFalse($this->cache->exists('validKey'));
    }

    public function testDeleteInvalidKey()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        $this->cache->delete('invalidKey');

        $this->assertTrue($this->cache->exists('validKey'));
    }

    public function testDeleteInvalidKeyShorthand()
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');
        unset($this->cache->invalidKey);

        $this->assertTrue($this->cache->exists('validKey'));
    }
}
