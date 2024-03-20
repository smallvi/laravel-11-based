<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\ActiveStatusComposer;
use App\View\Composers\DiscountTypeComposer;

class AppServiceProvider extends ServiceProvider
{

    protected $view_composers = [
        ActiveStatusComposer::class =>
        ['admin.product_categories.*',],

        DiscountTypeComposer::class =>
        ['admin.product_categories.*',],
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach ($this->view_composers as $view_composer => $views) {
            View::composer($views, $view_composer);
        }
    }
}
