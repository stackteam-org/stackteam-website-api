<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'author_id',
        'title',
        'subtext',
        'text',
        'category_id', 
        'visit',
        'read_time', 
        'like', 
        'lang' 
        ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }

}
