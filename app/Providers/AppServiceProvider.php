<?php

namespace App\Providers;

use App\Models\DadosExcepcionais;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;


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
        Paginator::useBootstrapFive();

        // Carrega as configurações gerais para todas as views
        View::composer('*', function ($view) {
            $dados = DadosExcepcionais::first();
            $view->with('dadosExcep', $dados);
        });
    }
}
