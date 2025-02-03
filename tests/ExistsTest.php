<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

final class ExistsTest extends TestCase
{
    protected Cache $cache;

    protected function setUp(): void
    {
        $this->cache = new Cache();
        $this->cache->client()->flushall();
        $this->cache->put('validKey', 'my_value');
    }

    public function testValidKeyExists(): void
    {
        $this->assertTrue($this->cache->exists('validKey'));
    }

    public function testValidKeyExistsShorthand(): void
    {
        $this->assertTrue(isset($this->cache->validKey));
    }

    public function testInvalidKeyExists(): void
    {
        $this->assertFalse($this->cache->exists('invalidKey'));
    }

    public function testInvalidKeyExistsShorthand(): void
    {
        $this->assertFalse(isset($this->cache->invalidKey));
    }
}
