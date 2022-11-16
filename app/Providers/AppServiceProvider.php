<?php

namespace App\Providers;

use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $settings=Setting::first();
        view()->share(['settings'=>$settings]);

        $blogs=Post::select('id')->get();
        view()->share(['blogs'=>$blogs]);

        $dons=DonationRequest::select('id')->get();
        view()->share(['dons'=>$dons]);

    }
}
