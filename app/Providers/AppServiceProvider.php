<?php

namespace App\Providers;

use App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator\FactoryCalculatorEstimate;
use App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator\FactoryCalculatorInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FactoryCalculatorInterface::class, FactoryCalculatorEstimate::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
