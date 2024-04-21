<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{
    use HasFactory;
    protected $table = 'promoters';

    protected $fillable = [
        'promoterName',
        'promoterType',
        'promoterWallets',
        'comments',
    ];
}
