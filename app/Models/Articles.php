<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Articles extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'excerpt', 'body'];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
