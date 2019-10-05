<?php

namespace Imannms\LaravelS3CacheDriver;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class S3CacheServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    // protected $defer = true;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
	
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{				
		Cache::extend('s3', function($app, $config){
			return Cache::repository(new S3Store($config));
		});
	}
}