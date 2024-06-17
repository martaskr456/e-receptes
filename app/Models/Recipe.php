<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'cooking_time', 'ingredients', 'instructions', 'category_id', 'is_private', 'user_id', 'image'
    ];

    // Attiecība ar lietotāju (pieņemot, ka recepte pieder lietotājam)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
