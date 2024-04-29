<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'images'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
