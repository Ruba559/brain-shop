<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
  
    public function getProductByCategoryId($id)
    {
      return Product::ProductByCategoryId($id);
    }

    public function getProductByBrandId($id)
    {
      return Product::ProductByBrandId($id);
    }

    public function index()
    {
        return ProductResource::collection(Product::paginate(3));
    }

    
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description'=> 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'images' => 'required',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id'=> $request->category_id,
            'brand_id' => $request->brand_id,
            'slug' => $request->slug,
            'images' => $request->images,
        ]);

       
        return response($product, 201);
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'price' => 'required',
        //     'description'=> 'required',
        //     'category_id' => 'required',
        //     'brand_id' => 'required',
        //     'images' => 'required',
        // ]);

        // $product = Product::find($id); 

        // $product->update($request->all());

        // return response($product, 201);
    }

   
    public function destroy($id)
    {
        // $product = Product::find($id); 

        // $product->delete();

        // return response($product, 201);
    }
}
