<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'parent_id' => 'integer|nullable|digits:11|required',
            'name' => 'string|min:3|max:128|required',
            'slug' => 'string|min:3|max:128|required',
            'visible' => 'integer|between:0,1|required'
        ]);*/

        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->only([
            'parent_id',
            'name',
            'slug',
            'visible',
        ]));

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(!$category){
            return response()->json(['error' => 'Resource not found'], 404);        }
        $category->delete();
        return response()->json(null, 204);
    }
}
