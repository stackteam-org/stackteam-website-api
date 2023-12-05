<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'sub_title',
        'description',
        'lang'
    ];

    public function article()
    {
        return $this->belongsToMany(Article::class, 'technologies', 'technology_category_id','article_id');
    }

}
