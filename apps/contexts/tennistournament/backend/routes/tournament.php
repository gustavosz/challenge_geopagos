<?php

use Core\TennisTournament\Tournaments\Infrastructure\Controllers\SimulateTournamentGetController;
use Illuminate\Support\Facades\Route;

Route::post('tournaments/{id}/simulate', SimulateTournamentGetController::class);
