<?php namespace App\Providers;

use App\Db\DBCommon;
use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('App\Db\DBCommon', function($app)
        {
            // ? Config ?

            var_dump($app['config']);
            die();

            //return new DBCommon();

            //return new Connection($app['config']['database']);
        });
	}

}
