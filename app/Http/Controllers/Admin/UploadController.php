<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|max:2048',
        ]);
        try {
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $filename = 'image-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/assets/files/uploads');
                $file->move($destinationPath, $filename);
                $path = asset('assets/files/uploads/' . $filename);
                return response()->json(['fileName'=> $filename,'uploaded'=> 1,'url' => $path]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'File upload failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
