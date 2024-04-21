<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockchainPlatform extends Model
{
    use HasFactory;
    protected $table = 'blockchain_platforms';

    protected $fillable = [
        'platformName'
    ];
}
