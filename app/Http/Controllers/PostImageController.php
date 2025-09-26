<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostImageController extends Controller
{
    public function upload(Request $request)
    {
        $imagePath = $request->file('file')->store('uploads', 'public');
        return response()->json(["/storage/$imagePath"]);
    }
}
