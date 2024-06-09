<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;

    protected $fillable = ['article_id','image'];

    public function article(){
        return $this->hasOne('App\Models\Article','article_id', 'id');
    }

    public function articles(){
        return $this->belongsTo('App\Models\Article','article_id', 'id');
    }
}

