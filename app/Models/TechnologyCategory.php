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

    public function Technologies()
    {
        return $this->hasMany(Technology::class)->with('article');//->select(['id','article_id']);
    }

}
