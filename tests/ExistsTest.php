<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    protected $cache;

    protected function setUp(): void
    {
        $this->cache = new Cache();
        $this->cache->client()->flushall();
        $this->cache->put('validKey', 'my_value');
    }

    public function testValidKeyExists()
    {
        $this->assertTrue($this->cache->exists('validKey'));
    }

    public function testValidKeyExistsShorthand()
    {
        $this->assertTrue(isset($this->cache->validKey));
    }

    public function testInvalidKeyExists()
    {
        $this->assertFalse($this->cache->exists('invalidKey'));
    }

    public function testInvalidKeyExistsShorthand()
    {
        $this->assertFalse(isset($this->cache->invalidKey));
    }
}
