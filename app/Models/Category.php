<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'text', 'lang' ];


    public function Article(){
        return $this->hasMany(Article::class,'flight_id');
    }
}
