![Predis Adaptor](https://raw.githubusercontent.com/andrewdyer/andrewdyer/refs/heads/main/assets/images/covers/predis-adaptor.png)

# 🗄️ Predis Adaptor

A simple framework-agnostic caching solution using Redis.

## 📄 License

Licensed under the [MIT license](https://opensource.org/licenses/MIT) and is free for private or commercial projects.

## ✨ Introduction

Predis Adaptor provides a straightforward way to implement caching operations using Redis in any PHP application. The library offers an easy-to-use interface for storing, retrieving, and managing cached data, supports custom cache configurations, and provides flexible cache management methods.

## 📥 Installation

```bash
composer require andrewdyer/predis-adaptor
```

## 🚀 Getting Started

To start using Predis Adaptor, you need to initialize the cache by creating a new instance of the `Cache` class with the necessary configuration options.

```php
use Anddye\PredisAdaptor\Cache;

$cache = new Cache([
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

## 📖 Usage

### Client

Returns the underlying Predis client instance.

```php
$client = $cache->client();
```

### Delete

Deletes the specified key from the cache.

```php
$cache->delete('my_key');
```

### Exists

Checks if the specified key exists in the cache.

```php
$bool = $cache->exists('my_key');
```

### Get

Retrieves the value of the specified key from the cache.

```php
$value = $cache->get('my_key');
```

### Put

Stores a value in the cache with the specified key.

```php
$cache->put('my_key', 'my_value');
```

### Remember

Retrieves the value of the specified key from the cache, or stores the result of the callback if the key does not exist.

```php
$value = $cache->remember('my_key', 10, function () {
    return 'my_value';
});
```

## Useful Links

* [Redis](http://redis.io/)
* [Predis](https://github.com/nrk/predis)
* [Install and config Redis on Mac OS X via Homebrew](https://medium.com/@petehouston/install-and-config-redis-on-mac-os-x-via-homebrew-eb8df9a4f298)
