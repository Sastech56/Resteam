<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function cartDetail()
    {
        return $this->hasOne('App\Models\CartDetail');
    }

    public function transactionDetail()
    {
        return $this->hasOne('App\Models\TransactionDetail');
    }
}
