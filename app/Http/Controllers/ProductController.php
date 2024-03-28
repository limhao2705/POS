<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Log;
use Illuminate\Support\Facades\File;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('layouts.product.main', compact('products'));
    }
    public function create(){
        return view('layouts.product.crud.add');
    }
    public function store(Request $request){
        //dd($request->image);

        $data = $request->validate([
            'name' => 'required|unique:products', // Assuming 'products' is the table name
            'image'=> 'nullable|unique:products|mimes:png,jpeg,jpg,webp',
            'barcode' => 'required|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'nullable', // 'nullable' means the field can be empty; 'max' for character limit
            'status' => 'sometimes'
        ]);
        
        $path = 'uploads/product/';
    
        // Check if the directory exists, if not create it with proper permissions
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0775, true, true);
        }

        // Initialize $filename as null to handle cases when no image is uploaded
        $filename = null;
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        
        //     if ($file->isValid()) {
        //         $extension = $file->guessExtension();
        //         $filename = time().'.'.$extension;
        //         $file->move($path, $filename);
        //     } else {
        //        // Handle the error, e.g., return with an error message
        //         return back()->withErrors(['image' => 'Error uploading file: '.$file->getError()]);
        //     }
        // } else {
        //     // If no file was uploaded, you can set a default image or handle accordingly
        //     $filename = null;
        // }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
        
            if ($file->isValid()) {
                // Use the original file name
                $filename = $file->getClientOriginalName();
                
                // Check if the filename already exists in the database
                $exists = Product::where('image', $path.$filename)->exists(); // Assuming 'Product' is your model name
        
                if ($exists) {
                    // Return with a message to the user that the filename already exists
                    return back()->withErrors(['image' => 'The filename "'.$filename.'" has already been used. Please change the file name or upload a different image.']);
                } else {
                    // Move the file to the desired location
                    $file->move($path, $filename);
        
                    // Proceed to store the new product and image information in the database
                    Product::create([
                        'name' => $request->name,
                        'image' => $path.$filename, // Make sure $path is defined earlier and is correct
                        'barcode' => $request->barcode,
                        'price' => $request->price,
                        'quantity' => $request->quantity,
                        'description' => $request->description,
                        'status' => $request->status
                    ]);
        
                    // ... rest of the code to return a successful response or redirect
                }
            } else {
                // Handle the error, e.g., return with an error message
                return back()->withErrors(['image' => 'Error uploading file: ' . $file->getError()]);
            }
        } else {
            // If no file was uploaded, you can set a default image or handle accordingly
            $filename = null; // Or any default image you have
        
            // Create the product with the default image
            Product::create([
                'name' => $request->name,
                'image' => $path.$filename, // Make sure $path includes default image path if needed
                'barcode' => $request->barcode,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'status' => $request->status
            ]);
    
            session()->flash('status', 'New product has been created successfully!');
            // $newProducts = Product::create($data);
    
        }
        return redirect(route('product.main'));
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect(route('product.main'))->with('status', 'Product deleted successfully!');
    }

    public function edit(Product $product){
        //dd($product);
        return view('layouts.product.crud.edit', compact('product'));
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required|unique:products', // Assuming 'products' is the table name
            'image'=> 'nullable|unique:products|mimes:png,jpeg,jpg,webp',
            'barcode' => 'required|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'nullable', // 'nullable' means the field can be empty; 'max' for character limit
            'status' => 'sometimes'
        ]);

        $product->update($data);

        return redirect(route('product.main'))->with('status', 'Updated Successfully!');
    }
}