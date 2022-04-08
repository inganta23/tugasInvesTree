<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','category_id','title', 'content', 'image'
    ];

    //relasi terhadap user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relasi terhadap category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
