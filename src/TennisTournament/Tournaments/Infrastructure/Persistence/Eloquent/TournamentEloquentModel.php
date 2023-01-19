<?php

namespace Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent;

use Core\TennisTournament\Players\Domain\FemalePlayer;
use Core\TennisTournament\Players\Domain\MalePlayer;
use Core\TennisTournament\Players\Domain\PlayerGender;
use Core\TennisTournament\Players\Domain\PlayerName;
use Core\TennisTournament\Players\Domain\PlayerReactionTime;
use Core\TennisTournament\Players\Domain\PlayerSkill;
use Core\TennisTournament\Players\Domain\PlayerSpeed;
use Core\TennisTournament\Players\Domain\PlayerStrength;
use Core\TennisTournament\Players\Infrastructure\Persistence\Eloquent\PlayerEloquentModel;
use Core\TennisTournament\Tournaments\Domain\TournamentGender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

final class TournamentEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'tournaments';
    protected $keyType = 'string';
    protected $fillable = ['modality', 'gender'];

    public $incrementing = false;
    public $timestamps = false;

    protected static function newFactory()
    {
        return TournamentEloquentFactory::new();
    }

    public function players()
    {
        return $this->belongsToMany(PlayerEloquentModel::class, 'player_tournament', 'tournament_id', 'player_id');
    }

    public function playersToDomain(): array
    {
        $result = array();
        $players = $this->players;

        $players->each(function ($player) use (&$result) {
            switch ($this->gender) {
                case TournamentGender::FEMALE:
                    $result[] = new FemalePlayer(
                        new PlayerName($player->name),
                        new PlayerSkill($player->skill),
                        new PlayerGender($player->gender),
                        new PlayerReactionTime($player->reaction_time)
                    );
                    break;
                case TournamentGender::MALE:
                    $result[] = new MalePlayer(
                        new PlayerName($player->name),
                        new PlayerSkill($player->skill),
                        new PlayerGender($player->gender),
                        new PlayerStrength($player->strength),
                        new PlayerSpeed($player->speed)
                    );
                    break;
                default:
                    throw new InvalidArgumentException('The gender is not valid.');
            }
        });

        return $result;
    }
}
