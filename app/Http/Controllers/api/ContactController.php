<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        
        $contact = Contact::create($request->all());
        return response()->json(['message' => 'درخواست مشاوره با موفقیت ایجاد شد', 'data' => $contact], 201);
    }
}
