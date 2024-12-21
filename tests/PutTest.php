<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

class PutTest extends TestCase
{
    protected Cache $cache;

    protected function setUp(): void
    {
        $this->cache = new Cache();
    }

    public function testPut(): void
    {
        $this->cache->client()->flushall();

        $this->cache->put('validKey', 'my_value');

        $this->assertTrue($this->cache->exists('validKey'));
    }

    public function testPutShorthand(): void
    {
        $this->cache->client()->flushall();

        $this->cache->validKey = 'my_value';

        $this->assertTrue($this->cache->exists('validKey'));
    }
}
