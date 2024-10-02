<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = Branch::orderBy('soffice', 'desc')->paginate(10);
        confirmDelete('Delete Branch!', "Are you sure you want to delete?");
        return view('apps.branch.index', ['type_menu' => 'branch', 'branch' => $branch]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.branch.create', ['type_menu' => 'branch']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = $request->image ?? null;

        if($imageName){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('images/branch', $imageName, 'public');
        }
        Branch::create([
            'soffice' => $request->soffice,
            'soffice_desc' => $request->soffice_desc,
            'alamat' => $request->alamat,
            'image' => $imageName ?? '-',
            'no_telp' => $request->no_telp,
            'branch_manager' => $request->branch_manager,
            'email' => $request->email,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'gmaps_link' => $request->gmaps_link
        ]);

        return redirect()->route('branch.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return view('apps.branch.edit', ['type_menu' => 'branch', 'branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $imageName = $request->image ?? null;

        if($imageName){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('images/branch', $imageName, 'public');
        }
        $branch->update([
            'soffice' => $request->soffice ?? $branch->soffice,
            'soffice_desc' => $request->soffice_desc ?? $branch->soffice_desc,
            'alamat' => $request->alamat ?? $branch->alamat,
            'image' => $imageName ?? $branch->image,
            'no_telp' => $request->no_telp ?? $branch->no_telp,
            'branch_manager' => $request->branch_manager ?? $branch->branch_manager,
            'email' => $request->email ?? $branch->email,
            'longitude' => $request->longitude ?? $branch->longitude,
            'latitude' => $request->latitude ?? $branch->latitude,
            'gmaps_link' => $request->gmaps_link ?? $branch->gmaps_link
        ]);

        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        toast($branch->soffice_desc.' was deleted!','success');
        return redirect()->back();
    }
}
