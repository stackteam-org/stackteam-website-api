<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_method',
        'admin_notes',
        'contacted',
        'lang',
        'method_type'
        ];
}
