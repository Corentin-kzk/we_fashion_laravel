<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'detail'
    ];
    public function sizes() : belongsToMany
    {
        return $this->belongsToMany(Size::class);
    }
    public function categories() : belongsToMany
    {
        return $this->belongsToMany(Categorie::class);
    }
}
