<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'social_media',
        'comments',
    ];
}
