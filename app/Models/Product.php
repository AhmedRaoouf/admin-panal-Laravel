<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'price',
        'discount_price',
        'img',
        'cat_id',
    ];

    // Product belongs to Cats
    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

}
