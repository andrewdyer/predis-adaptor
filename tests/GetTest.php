<?php

use Anddye\PredisAdaptor\Cache;
use PHPUnit\Framework\TestCase;

final class GetTest extends TestCase
{
    protected Cache $cache;

    protected function setUp(): void
    {
        $this->cache = new Cache();
        $this->cache->client()->flushall();
        $this->cache->put('validKey', 'my_value');
    }

    public function testGet(): void
    {
        $this->assertEquals($this->cache->get('validKey'), 'my_value');
    }

    public function testGetShorthand(): void
    {
        $this->assertEquals($this->cache->validKey, 'my_value');
    }

    public function testRememberGet(): void
    {
        $value = $this->cache->remember('validKey', 10, function () {
            return 'my_value';
        });

        $this->assertEquals($value, 'my_value');
    }
}
