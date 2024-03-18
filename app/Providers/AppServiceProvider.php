<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\ActiveStatusComposer;

class AppServiceProvider extends ServiceProvider
{

    protected $view_composers = [
        ActiveStatusComposer::class =>
        ['admin.product_categories.*', 'dashboard'],
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
