<?php

namespace Apps\providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        foreach (File::allFiles(base_path('apps/contexts/**/backend/routes')) as $routeFile) {
            $type = 'api';

            Route::prefix($type)
                ->middleware($type)
                ->group($routeFile->getRealPath());
        }
    }
}
