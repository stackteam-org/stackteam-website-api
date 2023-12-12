<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number',
        'admin_notes',
        'contacted',
        'full_name',
        'lang',
        ];
}
