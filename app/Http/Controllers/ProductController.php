<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Categories;
use App\Models\Principal;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::paginate(10);
        confirmDelete('Delete Product!', "Are you sure you want to delete?");
        return view('apps.product.index', ['type_menu' => 'product', 'product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $principal = Principal::get();
        $linis = Categories::get();

        return view('apps.product.create', ['type_menu' => 'product', 'principal' => $principal, 'linis' => $linis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        Product::create($request->all());

        return redirect('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $principal = Principal::get();
        $linis = Categories::get();

        return view('apps.product.edit', ['type_menu' => 'product', 'product' => $product, 'principal' => $principal, 'linis' => $linis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toast($product->name.' was deleted!','success');
        return redirect('product');
    }

    public function export(Request $request)
    {
        $import = new ProductImport();
        Excel::import($import, $request->file('fileImport'));
        return redirect('product')->with('success', 'Import Berhasil');
    }
}
