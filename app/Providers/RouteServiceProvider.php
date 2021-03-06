<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use File;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->ajaxRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * create a js file with all the available routes to use in ajax requests
     * @return void
     */
    private function ajaxRoutes()
    {

        $routes = collect(app()->routes->getRoutes());
        $content = "let routes = { \r\n";
        foreach ($routes as $key => $route) {
            if (!isset($route->action['as'])) {
                continue;
            }
            $name = $route->action['as'];
            $path = url('') . '/' . $route->uri;
            $content .= "    '$name': '$path', \r\n";
        }
        $content = trim($content, ',');
        $content .= "\r\n }; \r\n export default routes";

        File::put(resource_path('js/routes.js'), $content);
    }
}
