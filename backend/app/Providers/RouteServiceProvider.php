<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Finder;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $prefix_api = config('app.prefix_api');
        $this->routes(function () use ($prefix_api) {
			Route::prefix("{$prefix_api}api")
				->middleware('api')
				->namespace($this->namespace)
				->group(function(){
					$this->requireRoutes('routes/api');
				});

			Route::middleware('web')
				->namespace($this->namespace)
				->group(base_path('routes/web.php'));
		});
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(200)->by(optional($request->user())->id ?: $request->ip());
        });
    }
    public function requireRoutes($path)
	{
		return collect(
			Finder::create()->in(base_path($path))->name('*.php')
		)->each(
			function ($file) {
				include $file->getRealPath();
			}
		);
	}
}
