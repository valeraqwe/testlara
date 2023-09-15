<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentTaskRepository;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, EloquentTaskRepository::class);
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
