<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'technology_category_id',
        'article_id',
    ];

    public function article()
    {
        return $this->hasOne(Article::class,'id')->select(['id','name','title','subtext']);
    }
}
