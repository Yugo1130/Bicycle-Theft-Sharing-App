<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // APP_ENVがproductionの時だけ有効
        // デプロイ先で要設定
        if (App::environment('production')) {
            URL::forceScheme('https'); // HTTPS リダイレクトを有効にする
            $this->app['request']->server->set('HTTPS', 'on'); // ページネーションURLもhttpsになるように
        }
    }
}
