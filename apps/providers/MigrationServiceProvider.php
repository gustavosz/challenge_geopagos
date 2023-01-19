<?php

namespace Apps\providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;

class MigrationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(
            File::allFiles(base_path('apps/contexts/**/backend/migrations'))
        );
    }
}
