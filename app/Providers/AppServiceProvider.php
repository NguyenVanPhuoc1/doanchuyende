<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\News;
use App\Models\Policy;

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
    public function boot()
    {
        Paginator::useBootstrap();

        //fix database
        Schema::defaultStringLength(191);

        // 
        $news = News::orderBy('created_at', 'desc')
        ->where('noi_bat', true) 
        ->take(5) 
        ->get();
        $policy = Policy::orderBy('created_at', 'desc')
        ->where('noi_bat', true) 
        ->take(5) 
        ->get();
        $viewData = [
            'listNews' => $news,
            'listPoli' => $policy,
        ];
        view()->share($viewData);
    }
}
