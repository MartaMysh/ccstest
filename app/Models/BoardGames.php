<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardGames extends Model
{
    use HasFactory;

    protected $table = 'board_games';

    protected $fillable = ['name', 'created_by', 'created_year', 'genre', 'language'];

    protected $connection = 'mysql';

    public static function allIdsWithNames(): array
    {
        $games = BoardGames::all('id', 'name');
        $boardGames = [];
        foreach ($games as $game) {
            $boardGames[$game->id] = $game->name;
        }
        return $boardGames;
    }
}
