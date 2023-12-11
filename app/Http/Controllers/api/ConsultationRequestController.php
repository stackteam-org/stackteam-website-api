<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ConsultationRequestController extends Controller
{
    public function store(Request $request)
    {
        $contactValue = $request->input('contact_method');
        if (filter_var($contactValue, FILTER_VALIDATE_EMAIL)) {
            $contactType = 'email';
        } elseif (preg_match("/^\+?(\d{1,3}[- ]?)?\d{10}$/", $contactValue)) {
            $contactType = 'phone';
        } else {
            return redirect()->back()->with('error','شماره یا ایمیل  را ضحیح وارد کنید');
        }
        $contact = ConsultationRequest::create([
            'contact_method'=> $contactValue,
            'method_type'=> $contactType,
            'lang'=> $request->lang,
        ]);
        return response()->json(['message' => 'درخواست مشاوره با موفقیت ایجاد شد', 'data' => $contact], 201);
    }
  
}
