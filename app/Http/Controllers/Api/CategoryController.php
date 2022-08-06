<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Trae todos los registros de la tabla categories
        $categories = Category::all(); //SELECT * FROM categories;
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Crea un nuevo registro (habilitar asignacion masiva - $fillable)
        $request->validate([
            'name' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255|unique:categories',
        ]);

        $category = Category::create($request->all());
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //Muestra un registro segun el parametro enviado
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Actualiza un registro
        $request->validate([
            'name' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255|unique:categories,slug,'.$category->id,
        ]);

        $category->update($request->all());
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //Elimina un registro segun el parametro enviado
        $category->delete();
        return $category;

    }
}
