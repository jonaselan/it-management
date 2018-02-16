<?php

namespace itmanagement\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = array(
            'Project'
        );

        foreach ($models as $model) {
            $this->app->bind("itmanagement\Repositories\Contracts\\i{$model}Repository",
                            "itmanagement\Repositories\\{$model}Repository");
        }

    }
}
