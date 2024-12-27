<?php

namespace App\Http\Controllers;

use App\Models\Catgeory;
use Illuminate\Http\Request;

class CatgeoryController extends Controller
{
    public function index()
    {
        $categories = Catgeory::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = Catgeory::find($id);
        if(!$category){
            return response()->json(['message' => 'Categroy not found'] , 404);
        }else{
            return response()->json($category);
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Catgeory::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Category created succesfully' , 'data' => $category] , 200);
    }

    public function update(Request $request , $id)
    {
        $category = Catgeory::find($id);

        if(!$category){
            return response()->json(['message' , 'Sorry we cannot find the catgeory'] , 404);
        }

        $request->validate([
            'name' => 'required',
        ]);

        $category->update([
            'name'=>$request->name,
        ]);

        return response()->json(['message' , 'Category updated succesfully!' , 'data' => $category] , 200);
    }

    public function delete($id)
    {
        $category = Catgeory::find($id);

        if(!$category){
            return response()->json(['message' , 'Sorry we cannot find catgeory!'] , 404);
        }

        $category->delete();

        return response()->json(['message' , 'Category deleted succesfully!!' , 'data' => $category] , 200);
    }
}
