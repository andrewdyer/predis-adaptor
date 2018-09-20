# Predis Adaptor

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/6b9148b403e94cbabbc18abf0c667165)](https://www.codacy.com/app/andrewdyer/predis-adaptor?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=andrewdyer/predis-adaptor&amp;utm_campaign=Badge_Grade)
[![Latest Stable Version](https://poser.pugx.org/andrewdyer/predis-adaptor/version)](https://packagist.org/packages/andrewdyer/predis-adaptor)
[![Latest Unstable Version](https://poser.pugx.org/andrewdyer/predis-adaptor/v/unstable)](//packagist.org/packages/andrewdyer/predis-adaptor)
[![License](https://poser.pugx.org/andrewdyer/predis-adaptor/license)](https://packagist.org/packages/andrewdyer/predis-adaptor)
[![Total Downloads](https://poser.pugx.org/andrewdyer/predis-adaptor/downloads)](https://packagist.org/packages/andrewdyer/predis-adaptor)
[![Daily Downloads](https://poser.pugx.org/andrewdyer/predis-adaptor/d/daily)](https://packagist.org/packages/andrewdyer/predis-adaptor)
[![Monthly Downloads](https://poser.pugx.org/andrewdyer/predis-adaptor/d/monthly)](https://packagist.org/packages/andrewdyer/predis-adaptor)
[![composer.lock available](https://poser.pugx.org/andrewdyer/predis-adaptor/composerlock)](https://packagist.org/packages/andrewdyer/predis-adaptor)

A helper for caching slow operations using Redis.

## Index
* [License](#license)
* [Installation](#installation)
* [Usage](#usage)
    * [Supported Options](#supported-options)
    * [Methods](#methods)
        * [Delete](#delete)
        * [Exists](#exists)
        * [Get](#get)
        * [Put](#put)
        * [Remember](#remember)
* [Useful Links](#useful-links)

## License

Licensed under MIT. Totally free for private or commercial projects.

## Installation

```bash
composer require andrewdyer/predis-adaptor
```

## Usage

```php
<?php

$cache = new Anddye\PredisAdaptor([
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