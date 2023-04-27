<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "name",
        "description",
        "price",
        "image",
        "reference",
        "status",
        "published",
        "categories",
    ];
    public function sizes(): belongsToMany
    {
        return $this->belongsToMany(Size::class);
    }
    public function categories(): belongsToMany
    {
        return $this->belongsToMany(Categorie::class);
    }
    public function imageUrl(): string
    {
        return Storage::url($this->image);
    }
}
