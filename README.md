Laravel S3 cache driver for Laravel 5.8+. Support: Amazon S3, Digital Ocean Spaces, etc.

The repository is originally forked from `Illuminate\Cache\FileStore`.

The advantages of using S3 is because S3 have an **unlimited storage** or **big storage**. You can cache everything without worried about your storage capacity. And it's cheap.

Redis, Memcached, and almost others laravel default cache store have a limited storage.

---

# How to install

1. `composer require imannms/laravel-s3-cache-driver`
2. edit `config/cache.php` with the config template bellow. Then, run `php artisan config:cache`.

Please choose one.

Amazon S3 config template.
```php
	
	'stores' => [
		
		// other stores
		
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
			'path' => env('AWS_PATH', 'cache'), // cache root directory, you can change it to suit your need
        ],
	]
```

Digital Ocean Spaces config template.
```php
	
	'stores' => [
	
		// other stores
	
		'do_spaces' => [
			'driver' => 's3',
			'key' => env('DO_SPACES_KEY'),
			'secret' => env('DO_SPACES_SECRET'),
			'region' => env('DO_SPACES_REGION'),
			'bucket' => env('DO_SPACES_BUCKET'),
			'endpoint' => env('DO_SPACES_ENDPOINT'),
			'path' => env('DO_SPACES_PATH', 'cache'), // cache root directory, you can change it to suit your need
		],
	]
```

---

# How to use

```php

use Cache;

Cache::store('s3')->put('key', 'value', 60*5);
Cache::store('s3')->get('key');

```

---
# Recommendation

Enable CDN on your cloud storage for faster speed.
