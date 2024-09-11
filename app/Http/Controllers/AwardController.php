<?php

namespace App\Http\Controllers;

use App\Http\Resources\AwardResource;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $award = Award::paginate(10);
        // return view('apps.award.index', ['type_menu' => 'Award', 'award' => $award]);
        return new AwardResource(true, 'Data Award', $award);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.award.create', ['type_menu' => 'Award']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image_award ?? null;

        if($image){
            // dd(true);
        }
        // dd(false);
        // Award::create([
        //     'nama_award' => $request->nama_award,
        //     'nama_award_en' => $request->nama_award_en,
        //     'image_award' => $request->file('image_award')->getClientOriginalName(),
        //     'image_award_show' => $request->file('image_award_show')->getClientOriginalName(),
        //     'date_award' => $request->date_award,
        // ]);
        return redirect()->route('award.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Award $award)
    {
        return view('apps.award.edit', ['type_menu' => 'Award', 'award' => $award]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Award $award)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Award $award)
    {
        //
    }
}
