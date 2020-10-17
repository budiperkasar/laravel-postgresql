<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
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
        return $query->where('created_by', $id);
    }

}
