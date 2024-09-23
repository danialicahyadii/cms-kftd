<?php

namespace App\Http\Controllers;

use App\Models\Principal;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principal = Principal::orderBy('id', 'desc')->paginate(10);
        confirmDelete('Delete Principal!', "Are you sure you want to delete?");
        return view('apps.principal.index', ['type_menu' => 'principal', 'principal' => $principal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.principal.create', ['type_menu' => 'principal']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('principal', $imageName, 'public');
        }
        Principal::create([
            'name_principal' => $request->name_principal,
            'image' => $imageName ?? null,
            'lini' => $request->lini
        ]);

        return redirect('principal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Principal $principal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Principal $principal)
    {
        return view('apps.principal.edit', ['type_menu' => 'principal', 'principal' => $principal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Principal $principal)
    {
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('principal', $imageName, 'public');
        }
        $principal->update([
            'name_principal' => $request->name_principal,
            'image' => $imageName ?? $principal->image,
            'lini' => $request->lini
        ]);

        return redirect('principal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Principal $principal)
    {
        $principal->delete();
        toast($principal->name_principal.' was deleted!','success');
        return redirect('principal');
    }
}
