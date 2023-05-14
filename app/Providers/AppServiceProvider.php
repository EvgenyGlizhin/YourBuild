<?php

namespace App\Providers;

use App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator\EstimateCalculatorFactory;
use App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator\InterfaceCalculatorFactory;
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
        $this->app->bind(InterfaceCalculatorFactory::class, EstimateCalculatorFactory::class);
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
