<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletAddress extends Model
{
    use HasFactory;
    protected $table = 'wallet_addresses';

    protected $fillable = [
        'holder_name',
        'holder_category',
        'address',
    ];
}
