<?php

namespace App\Http\Controllers;

use App\Http\Resources\AwardResource;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $award = Award::orderBy('id', 'desc')->paginate(10);
        confirmDelete('Delete Award!', "Are you sure you want to delete?");
        return view('apps.award.index', ['type_menu' => 'Award', 'award' => $award]);
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
        $imageAward = $request->image_award ?? null;
        $imageAwardShow = $request->image_award_show ?? null;

        if($imageAward){
            $imageAwardPath = $request->file('image_award')->store('images/awards', 'public');
        }
        if($imageAwardShow){
            $imageAwardShowPath = $request->file('image_award_show')->store('images/awards', 'public');
        }
        Award::create([
            'nama_award' => $request->nama_award,
            'nama_award_en' => $request->nama_award_en,
            'image_award' => $imageAwardPath ?? 'null',
            'image_award_show' => $imageAwardShowPath ?? 'null',
            'date_award' => $request->date_award,
        ]);
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
        $imageAwardPath = $award->image_award;
        $imageAwardShowPath = $award->image_award_show;

        if ($request->hasFile('image')) {
            if ($award->image_award && Storage::disk('public')->exists($award->image_award)) {
                Storage::disk('public')->delete($award->image_award);
            }
            $imageAwardPath = $request->file('image')->store('images/awards', 'public');
        }

        if ($request->hasFile('image_award_show')) {
            if ($award->image_award_show && Storage::disk('public')->exists($award->image_award_show)) {
                Storage::disk('public')->delete($award->image_award_show);
            }
            $imageAwardShowPath = $request->file('image_award_show')->store('images/awards', 'public');
        }

        // dd($imageAwardPath, $imageAwardShowPath, $request->all());

        $award->update([
            'nama_award' => $request->nama_award ?? $award->nama_award,
            'nama_award_en' => $request->nama_award_en ?? $award->nama_award_en,
            'image_award' => $imageAwardPath,
            'image_award_show' => $imageAwardShowPath,
            'date_award' => $request->date_award ?? $award->date_award
        ]);

        return redirect()->route('award.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Award $award)
    {
        $award->delete();
        toast($award->nama_award.' was deleted!','success');
        return back();
    }
}
