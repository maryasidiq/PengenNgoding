<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrixUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('trix-images', 'public');
            return response()->json([
                'url' => asset('storage/' . $path)
            ]);
        }
        return response()->json(['error' => 'Upload gagal'], 400);
    }
}
