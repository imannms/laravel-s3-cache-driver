<?php

namespace Imannms\LaravelS3CacheDriver;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Repository;

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
		Cache::extend('s3', function($app){
			return new Repository(new S3Store);
		});
	}
}