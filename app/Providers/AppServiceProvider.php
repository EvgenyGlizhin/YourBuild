<?php

namespace App\Providers;

use App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator\EstimateCalculatorFactoryInterface;
use App\Http\Calculators\EstimateCalculator\FactoryEstimateCalculator\CalculatorFactoryInterface;
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
        $this->app->bind(CalculatorFactoryInterface::class, EstimateCalculatorFactoryInterface::class);
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
