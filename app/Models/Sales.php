<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $connection = 'sqlite';

    protected $fillable = ['board_game_id', 'price', 'market', 'customer'];
}
