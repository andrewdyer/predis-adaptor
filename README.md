<h1 align="center">Predis Adaptor</h1>

<p align="center">A helper for caching slow operations using Redis.</p>

<p align="center">
    <a href="https://packagist.org/packages/andrewdyer/predis-adaptor"><img src="https://poser.pugx.org/andrewdyer/predis-adaptor/downloads?style=for-the-badge" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/andrewdyer/predis-adaptor"><img src="https://poser.pugx.org/andrewdyer/predis-adaptor/v?style=for-the-badge" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/andrewdyer/predis-adaptor"><img src="https://poser.pugx.org/andrewdyer/predis-adaptor/license?style=for-the-badge" alt="License"></a>
</p>

## License

Licensed under MIT. Totally free for private or commercial projects.

## Installation

```bash
composer require andrewdyer/predis-adaptor
```

## Usage

```php
<?php

$cache = new Anddye\PredisAdaptor\Cache([
    'host'      => '',
    'password'  => '',
    'port'      => '',
    'scheme'    => '',
]);
```

### Supported Options

| Option | Type | Default | Description |
| --- | --- | --- | --- |
| host | string | 127.0.0.1 | IP or hostname of the target server.  |
| password | string | not set | Accepts a value used to authenticate with a Redis server protected by password with the `AUTH` command. |
| port | string | 6379 | TCP/IP port of the target server. |
| scheme | string | tcp | Specifies the protocol used to communicate with an instance of Redis. |


### Methods

| Method | Description |
| --- | --- |
| `$cache->client()` |  |
| `$cache->delete(string $key)` |  |
| `$cache->exists(string $key)` |  |
| `$cache->get(string $key)` |  |
| `$cache->put(string $key, $value, int $minutes = 10)` |  |
| `$cache->remember(string $key, int $minutes, callable $callback)` |  |

#### Delete

```php
$cache->delete('my_key');
unset($cache->my_key);
unset($cache['my_key'])
```

#### Exists

```php
$bool = $cache->exists('my_key');
$bool = isset($cache->my_key);
```

#### Get

```php
$value = $cache->get('my_key');
$value = $cache->my_key;
```

#### Put

```php
$cache->put('my_key', 'my_value');
$cache->my_key = 'my_value';
```

#### Remember

```php
$value = $cache->remember('my_key', 10, function () {
    return 'my_value';
});
```

## Useful Links

* [Redis](http://redis.io/)
* [Predis](https://github.com/nrk/predis)
* [Install and config Redis on Mac OS X via Homebrew](https://medium.com/@petehouston/install-and-config-redis-on-mac-os-x-via-homebrew-eb8df9a4f298)
