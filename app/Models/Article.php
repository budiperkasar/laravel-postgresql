<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';

    public function scopeAll($query)
    {
        return $query->get();
    }

    public function scopePopular($query, $id)
    {
        return $query->where('priority', '>', $id);
    }

    public function scopeById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeByCreator($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function contributor()
    {
        return $this->belongsTo(User::class);
    }

}
