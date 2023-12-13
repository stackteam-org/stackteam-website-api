<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // if ($request->hasFile('image')) {
        //     $originName = $request->file('image')->getClientOriginalName();
        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $fileName = $fileName . '_' . time() . '.' . $extension;
        //     $request->image->storeAs('public/media', $fileName);

        //     // $request->file('upload')->move(public_path('media'), $fileName);

        //     $url = asset('storage/media/' . $fileName);
        //     return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        // }
    
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . "_" . time() . "." . $extension;

            $request->file('image')->storeAs('public/images', $fileName);

            $url = Storage::url('images/' . $fileName);

            return response()->json([
                'success' => 1,
                'file' => [
                    'url'=> asset($url) ,
                ],
            ]);
        }
    }


    public function imageUpload(Request $request){
        return response()->json($request);
    }
}
