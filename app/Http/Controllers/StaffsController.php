<?php

namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Http\Request;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staffs::paginate(10);
        confirmDelete('Delete Staffs!', "Are you sure you want to delete?");
        return view('apps.staffs.index', ['type_menu' => 'staffs', 'staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.staffs.create', ['type_menu' => 'staffs']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('images/staffs', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }
        Staffs::create([
            'name' => $request->name,
            'position' => $request->position,
            'position_en' => $request->position_en,
            'specialist' => $request->specialist,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'image_name' => $imageName ?? '-',
            'image_url' => $imageUrl ?? '-',
            'grup' => $request->grup ?? '-'
        ]);

        return redirect('staffs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staffs $staffs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staffs = Staffs::find($id);
        return view('apps.staffs.edit', ['type_menu' => 'staffs', 'staffs' => $staffs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $staffs = Staffs::find($id);
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('images/staffs', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }
        $staffs->update([
            'name' => $request->name,
            'position' => $request->position,
            'position_en' => $request->position_en,
            'specialist' => $request->specialist,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'image_name' => $imageName ?? $staffs->image_name,
            'image_url' => $imageUrl ?? $staffs->image_url,
            'grup' => $request->grup ?? '-'
        ]);

        return redirect('staffs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $staffs = Staffs::find($id);
        $staffs->delete();
        toast($staffs->name.' was deleted!','success');
        return redirect('staffs');
    }
}
