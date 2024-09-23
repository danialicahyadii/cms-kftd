<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
Use Alert;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::paginate(10);

        confirmDelete('Delete Categories!', "Are you sure you want to delete?");

        return view('apps.categories.index', ['type_menu' => 'categories', 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.categories.create', ['type_menu' => 'categories']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categories::create($request->all());

        toast($request->name.' was created!','success');

        return redirect('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('apps.categories.edit', ['type_menu' => 'categories', 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $categories = Categories::find($id);
        $categories->update($request->all());

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        toast($categories->name.' was deleted!','success');
        return redirect('categories');
    }
}
