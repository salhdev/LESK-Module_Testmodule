<?php
namespace App\Modules\Testmodule\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class TestmoduleServiceProvider extends ServiceProvider
{
	/**
	 * Register the Testmodule module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Testmodule\Providers\RouteServiceProvider');

//		App::register('Edofre\SliderPro\SliderProServiceProvider::class');
		App::register('Edofre\SliderPro\SliderProServiceProvider');
        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('SliderPro', Edofre\SliderPro\Facades\SliderPro::class);
        });

		$this->registerNamespaces();
	}

	/**
	 * Register the Testmodule module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('testmodule', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('testmodule', base_path('resources/views/vendor/testmodule'));
		View::addNamespace('testmodule', realpath(__DIR__.'/../Resources/Views'));
	}

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
		// $this->addMiddleware('');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('testmodule.php'),
        ], 'config');

        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'testmodule'
        );
    }

	/**
     * Register the Middleware
     *
     * @param  string $middleware
     */
	protected function addMiddleware($middleware)
	{
		$kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        $kernel->pushMiddleware($middleware);
	}
}
