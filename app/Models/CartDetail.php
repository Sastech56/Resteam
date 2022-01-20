<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
    public function game()
    {
        return $this->belongsTo('App\Models\Game', 'game_id');
    }
}
