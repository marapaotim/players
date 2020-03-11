<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\PlayerServiceInterface;
use App\Services\PlayerService;
use App\Formatters\Contracts\FormatterInterface;
use App\Formatters\PlayerFormatter;
use App\Repositories\Contracts\PlayerRepositoryInterface;
use App\Repositories\PlayerRepository;
use App\Services\Contracts\ImportPlayerServiceInterface;
use App\Services\ImportPlayerService;
use App\Services\Contracts\SubmitJobInterface;
use App\Services\SubmitJob;
use App\Services\Contracts\GetDataInterface;
use App\Services\GetPlayerDataService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PlayerServiceInterface::class, PlayerService::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(ImportPlayerServiceInterface::class, ImportPlayerService::class);
        $this->app->bind(SubmitJobInterface::class, SubmitJob::class);

        $this->app->when(ImportPlayerService::class)
            ->needs(GetDataInterface::class)
            ->give(GetPlayerDataService::class);

        $this->app->when(GetPlayerDataService::class)
            ->needs(FormatterInterface::class)
            ->give(PlayerFormatter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
