<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'published', 
        'lang' 
        ];
        protected $appends = ['image_url'];
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
        
        
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'articles_tags');
    }

    public function technologies()
    {
        return $this->belongsToMany(TechnologyCategory::class, 'technologies', 'article_id','technology_category_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function like(): bool
    {
        $this->like++;

        return $this->save();
    }

    public function visit(): bool
    {
        $this->visit++;

        return $this->save();
    }


    public function getImageUrlAttribute()
    {
        $fileExtension = 'jpg';

        if (Storage::disk('public')->exists("articles/{$this->id}.{$fileExtension}")) {
            return Storage::url("articles/{$this->id}.{$fileExtension}");
            // return Storage::disk('public')->url("articles/{$this->id}.{$fileExtension}");
        }
        return Storage::url("articles/placeholder.svg");
    }

    protected static function booted()
    {
        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('published', true);
        });
    }
}
