<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name'
    ];

    //relasi terhadap user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relasi terhadap article
    public function article()
    {
        return $this->hasMany(Article::class);
    }

}
