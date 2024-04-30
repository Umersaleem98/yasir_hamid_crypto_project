<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function create()
    {
        return view('layouts.category_add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'subcategory_name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate single image file
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $categoryName = $validatedData['category_name'];

            // Move the uploaded file to the public/images/{category_name} directory
            $image->move(public_path('images/' . $categoryName), $imageName);

            $category = Category::create([
                'name' => $validatedData['category_name'],
                'images' => $imageName, // Store the image name in the database
            ]);

            $subcategory = Subcategory::create([
                'name' => $validatedData['subcategory_name'],
                'category_id' => $category->id,
            ]);

            return view('layouts.category_add')->with('success', 'Category and subcategories deleted successfully.');
        } else {
            // Handle if no image was uploaded
            return back()->withInput()->withErrors(['image' => 'Please upload an image.']);
        }
    }



    public function category_list()
    {
        $categories = Category::with('subcategories')->get();
        return view('layouts.category_list',  compact('categories'));
    }


    public function destroy($id)
{
    $category = Category::findOrFail($id);

    // Delete associated subcategories
    $category->subcategories()->delete();

    // Delete image from storage
    if ($category->images) {
        Storage::delete('images/umer/' . $category->images);
    }

    // Delete category
    $category->delete();

    return redirect()->back()->with('success', 'Category and subcategories deleted successfully.');
}


public function Subcategory($id)
{
    // Find the subcategory by ID
    $subcategory = Subcategory::find($id);

    // Check if subcategory exists
    if (!$subcategory) {
        abort(404); // Or handle the case when the subcategory doesn't exist
    }

    // Get all categories
    $categories = Category::with('subcategories')->get();

    // Pass all categories and the specific subcategory data to the view
    return view('template.subcategory', ['subcategory' => $subcategory, 'categories' => $categories]);
}
}
