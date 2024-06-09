<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category', 'creator'];

    public function articleImages(){
        return $this->hasOne('App\Models\ArticleImage', 'article_id', 'id');
    }

    public function veterinarian(){
        return $this->belongsTo(Veterinarian::class, 'id');
    }
}