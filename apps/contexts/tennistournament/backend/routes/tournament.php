<?php

use Core\TennisTournament\Tournaments\Infrastructure\Controllers\SimulateTournamentGetController;
use Illuminate\Support\Facades\Route;

Route::get('tournaments/{id}/simulate', SimulateTournamentGetController::class);
