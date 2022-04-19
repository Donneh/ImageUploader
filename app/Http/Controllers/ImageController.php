<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index() {
        return Image::latest()->pluck('name')->toArray();
    }

    public function store(Request $request)
    {
        if(!$request->hasFile('image')) {
            return response()->json(['error' => 'There is no image present.'], 400);
        }

        $request->validate([
            'image' => 'required|file|image'
        ]);

        $path = $request->file('image')->store('public/images');

        if(!$path) {
            return response()->json(['error' => 'The file could not be saved.'], 500);
        }

        $file = $request->file('image');

        $image = Image::create([
            'name' => $file->hashName(),
            'extension' => $file->extension(),
            'size' => $file->getSize()
        ]);

        return $image->name;
    }

    public function delete(Request $request)
    {
        dump($request);
        $name = $request->getContent();
        \Storage::delete('public/images/' . $name);
        Image::where('name', $name)->delete();
    }
}
