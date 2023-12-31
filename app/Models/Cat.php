<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc'
    ];

    // Cats has many Products
    public function products(){
        return $this->hasMany(Product::class);
    }

}
