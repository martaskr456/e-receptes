<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'cooking_time', 
        'ingredients', 
        'instructions', 
        'category_id', 
        'is_private', 
        'user_id', 
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function isPublic()
    {
        return !$this->is_private;
    }
}
