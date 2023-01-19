<?php

namespace Apps\providers;

use Carbon\Laravel\ServiceProvider;
use Core\TennisTournament\Tournaments\Domain\TournamentRepository;
use Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent\EloquentTournamentRepository;

class TournamentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            TournamentRepository::class,
            EloquentTournamentRepository::class
        );
    }
}
