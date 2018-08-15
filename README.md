# Redis Adaptor

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/6b9148b403e94cbabbc18abf0c667165)](https://www.codacy.com/app/andrewdyer/redis-adaptor?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=andrewdyer/redis-adaptor&amp;utm_campaign=Badge_Grade)
[![Latest Stable Version](https://poser.pugx.org/andrewdyer/redis-adaptor/version)](https://packagist.org/packages/andrewdyer/redis-adaptor)
[![Latest Unstable Version](https://poser.pugx.org/andrewdyer/redis-adaptor/v/unstable)](//packagist.org/packages/andrewdyer/redis-adaptor)
[![License](https://poser.pugx.org/andrewdyer/redis-adaptor/license)](https://packagist.org/packages/andrewdyer/redis-adaptor)
[![Total Downloads](https://poser.pugx.org/andrewdyer/redis-adaptor/downloads)](https://packagist.org/packages/andrewdyer/redis-adaptor)
[![Daily Downloads](https://poser.pugx.org/andrewdyer/redis-adaptor/d/daily)](https://packagist.org/packages/andrewdyer/redis-adaptor)
[![Monthly Downloads](https://poser.pugx.org/andrewdyer/redis-adaptor/d/monthly)](https://packagist.org/packages/andrewdyer/redis-adaptor)
[![composer.lock available](https://poser.pugx.org/andrewdyer/redis-adaptor/composerlock)](https://packagist.org/packages/andrewdyer/redis-adaptor)

A helper for caching slow operations using Redis.

## Index
* [License](#license)
* [Installation](#installation)
* [Usage](#usage)
    * [Supported Options](#supported-options)
    * [Put](#put)
    * [Get](#get)
    * [Remember](#remember)
* [Useful Links](#useful-links)

## License

Licensed under MIT. Totally free for private or commercial projects.

## Installation

```bash
composer require andrewdyer/redis-adaptor
```

## Usage

```php
<?php

$cache = new \Anddye\Cache\RedisAdaptor([
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

### Put

```php
$articles = \App\Models\Article::all();

$cache->put('articles', $articles, 10);
```

### Get

```php
$articles = $cache->get('articles');

foreach ($articles as $article) {
    echo $article->title;
}
```

### Remember

```php
$articles = $cache->remember('articles', 10, function () {
    return \App\Models\Article::all();
});

foreach ($articles as $article) {
    echo $article->title;
}
```

## Useful Links

* [Redis](http://redis.io/)
* [Predis](https://github.com/nrk/predis)