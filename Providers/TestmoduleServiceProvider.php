<?php
namespace App\Modules\Testmodule\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

use \Illuminate\Foundation\AliasLoader;
use Edofre\SliderPro\Facades\SliderPro;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

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

// Begin Addition Salh
//  Registering packages installed within Module dependencies
//  Usefull read : https://laracasts.com/discuss/channels/laravel/register-service-provider-and-facade-within-service-provider
//           and : https://laracasts.com/discuss/channels/laravel/dynamic-class-aliases-in-package (the content did not work fully, specially Alias)
        if (!App::getProvider('Edofre\SliderPro\SliderProServiceProvider')) {
            App::register('Edofre\SliderPro\SliderProServiceProvider');
        // Below Here is the Facade
            $loader = AliasLoader::getInstance();
            $loader->alias('SliderPro', SliderPro::class);
        }
        if (!App::getProvider('Artesaos\SEOTools\Providers\SEOToolsServiceProvider')) {
            App::register('Artesaos\SEOTools\Providers\SEOToolsServiceProvider');
        // Below Here are the Facades

            $loader = AliasLoader::getInstance();
            $loader->alias('SEOMeta', SEOMeta::class);
            $loader->alias('OpenGraph', OpenGraph::class);
            $loader->alias('Twitter', TwitterCard::class);
        }
// End Addition Salh

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
            __DIR__.'/../config/config.php',
            'testmodule'
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
