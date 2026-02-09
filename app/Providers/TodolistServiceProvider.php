<?php

namespace App\Providers;

use App\Services\TodolistService;
use Illuminate\Support\ServiceProvider;
use App\Services\implementation\TodolistServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;

class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        TodolistService::class => TodolistServiceImpl::class
    ];
    public function provides(): array {
      return [TodolistService::class];
    }
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
