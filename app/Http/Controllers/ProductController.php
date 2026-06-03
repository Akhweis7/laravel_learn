<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

public function uploadImage(Request $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
        $product->image = $path;
        $product->save();
    }

    return response()->json([
        'message' => 'Image uploaded successfully',
        'image_url' => asset('storage/' . $product->image),
    ], 200);
}
    public function index()
    {
        $products = Cache::remember('products', 60, function () {
            return Product::all()->toArray();
        });
    
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        if (Gate::denies('create-product')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('update-product')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return response()->json($product, 200);
    }
    
    public function destroy($id)
    {
        if (Gate::denies('delete-product')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted'], 200);
    }
}