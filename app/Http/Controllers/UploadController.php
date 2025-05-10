<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
    use App\Models\Image;
class UploadController extends Controller
{ 

    public function index()
{
    $images = Image::all(); // Get all image paths from the database

    return view('images.index', compact('images')); // Pass data to view
}

    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        // Check if a file was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Store the image in the 'public' disk (storage/app/public)
            $path = $image->store('images', 'public'); // This stores the image in public/images folder
            // Save the image path to the database
            Image::create([
                'path' => $path // Save file path in the database
            ]);
            return back()->with('success', 'Image uploaded successfully!');
        }
        return back()->with('error', 'Please select a valid image.');
    }
    
}