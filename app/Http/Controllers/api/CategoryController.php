<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   
    public function index()
    {
        return  CategoryResource::collection(Category::paginate(3));
    }

    
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'image' => $request->image,
            'slug' => $request->slug,
        ]);

       
        return response($category, 201);
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
        //     'image' => 'required',
        // ]);

        // $category = Category::find($id); 

        // $category->update($request->all());

        // return response($category, 201);
    }

   
    public function destroy($id)
    {
        // $category = Category::find($id); 

        // $category->delete();

        // return response($category, 201);
    }
}
