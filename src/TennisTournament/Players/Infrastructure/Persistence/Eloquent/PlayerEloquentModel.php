<?php

namespace Core\TennisTournament\Players\Infrastructure\Persistence\Eloquent;

use Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent\TournamentEloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'players';
    protected $keyType = 'string';
    protected $fillable = ['name', 'skill', 'gender', 'reaction_time', 'strength', 'speed'];

    public $incrementing = false;
    public $timestamps = false;

    protected static function newFactory()
    {
        return PlayerEloquentFactory::new();
    }
}
