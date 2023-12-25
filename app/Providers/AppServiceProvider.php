<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use PowerComponents\LivewirePowerGrid\Button;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Model::preventLazyLoading(App::isLocal());
        Model::shouldBeStrict(App::isLocal());
    }
}
