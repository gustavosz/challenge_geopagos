<?php

namespace Core\TennisTournament\Rounds\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class RoundEloquentModel extends Model
{
    protected $table = 'rounds';

    public $timestamps = false;
}
