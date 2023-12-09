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
        // if ($request->hasFile('upload')) {
        //     $originName = $request->file('upload')->getClientOriginalName();
        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $request->file('upload')->getClientOriginalExtension();
        //     $fileName = $fileName . '_' . time() . '.' . $extension;
        //     $request->upload->storeAs('public/media', $fileName);

        //     // $request->file('upload')->move(public_path('media'), $fileName);

        //     $url = asset('storage/media/' . $fileName);
        //     return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        // }
    
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . "_" . time() . "." . $extension;

            $request->file('upload')->storeAs('public/ckeditor_images', $fileName);

            $url = Storage::url('ckeditor_images/' . $fileName);

            return response()->json(['uploaded' => true, 'url' => $url]);
        }

        return response()->json(['uploaded' => false, 'error' => ['message' => 'Could not upload the image.']]);
    
    }
}
