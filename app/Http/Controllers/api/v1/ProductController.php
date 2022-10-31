<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
   
    public function index()
    {

        $product = Product::get();

        return  ProductResource::collection($product);
     
    }


    public function store(ProductRequest $request)
    {
      
        $path = [];
        if ($request->hasfile('images')) {
            $images = $request->file('images');
        foreach($images as $key => $image ) {
    
            $name = $image->getClientOriginalName();
            
            $path[$key] = $image->storeAs('property', $name, 'public');
        }    
       }
      
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'images' =>  $path,
            'slug' => $this->slug($request->name),
        ]);

       
        return response($product, 201);
    }


    public function update(ProductRequest $request, $id)
    {

        $product = Product::find($id); 

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'slug' => $this->slug($request->name),
        ]);

        if ($request->images) {
            if($product->images)
            {
                foreach(json_decode($product->images) as $item)
                {
                    
                  if(File_exists(public_path().'/storage/'.$item))
                  {
        
                      unlink(public_path().'/storage/'.$item);
                  }
                }

            $images = $request->file('images');
            
            foreach($images as $key => $image ) {

              $name = $image->getClientOriginalName();
              $path[$key] = $image->storeAs('\product', $name, 'public');
            }  
           
                $product->update(['images' => json_encode($path)]);
        }else{
            
            $images = $request->file('images');
            
            foreach($images as $key => $image ) {

              $name = $image->getClientOriginalName();
              $path[$key] = $image->storeAs('\product', $name, 'public');
            }  
    
             $product->update(['images' => json_encode($path)]);
        }
        }

        return response($product, 201);
    }


    public function destroy($id)
    {

        $product = Product::find($id); 

        if(File_exists(public_path().'/storage/'.$product->images))
        {

           unlink(public_path().'/storage/'.$product->images);
        }

        $product->delete();

        return response($product, 201);
    }

    public function slug($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }
    
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
    
        return $string;
    }
}
