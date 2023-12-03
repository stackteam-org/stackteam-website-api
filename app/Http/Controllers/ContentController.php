<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\App;

use App\Models\Service;

class ContentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $response = Lang::get('wellcome');
        // get data form database -----------------------------
        $response['services']['items'] = Service::where('lang',App::getLocale())
        ->select(['name','id','title','subtitle','lang'])
        ->get();
        // ---------------------------------------------------

        return response()->json($response);
    }

    public function wellcome () {

        
    }

    
}
