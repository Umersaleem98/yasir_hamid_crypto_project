<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinsList extends Model
{
    use HasFactory;

    protected $table = 'coins_list';
    protected $fillable = [
        'name',
        'symbol',
        'coin_id',
    ];
}
