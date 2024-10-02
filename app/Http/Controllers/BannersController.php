<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banners::orderBy('id', 'desc')->paginate(10);
        confirmDelete('Delete Banners!', "Are you sure you want to delete?");
        return view('apps.banners.index', ['type_menu' => 'Banners', 'banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.banners.create', ['type_menu' => 'Banners']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->image_name ?? null;
        $imageUrl = $request->image_url ?? null;

        if ($request->hasFile('image_name')) {
            $name = $request->image_name->getClientOriginalName();
            $image = $request->image_name->storeAs('images/banners', $name, 'public');
            $imageUrl = asset('storage/' . $image);
        }
        Banners::create([
            'small_title' => $request->small_title ?? '-',
            'big_title' => $request->big_title ?? '-',
            'small_title_en' => $request->small_title_en ?? '-',
            'big_title_en' => $request->big_title_en ?? '-',
            'image_name' => $name ?? '-',
            'image_url' => $imageUrl ?? '-',
            'video_url' => $request->video_url ?? '-',
            'url_tag' => $request->url_tag ?? '-'
        ]);

        return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banners $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banners = Banners::find($id);
        return view('apps.banners.edit', ['type_menu' => 'banners', 'banners' => $banners]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banners = Banners::find($id);
        $name = $banners->image_name;
        $imageUrl = $banners->image_url;

        if ($request->hasFile('image_name')) {
            if ($banners->image_name && Storage::disk('public')->exists($banners->image_name)) {
                Storage::disk('public')->delete($banners->image_name);
            }
            $name = $request->image_name->getClientOriginalName();
            $image = $request->image_name->storeAs('images/banners', $name, 'public');
            $imageUrl = asset('storage/' . $image);
        }

        $banners->update([
            'small_title' => $request->small_title ?? '-',
            'big_title' => $request->big_title ?? '-',
            'small_title_en' => $request->small_title_en ?? '-',
            'big_title_en' => $request->big_title_en ?? '-',
            'image_name' => $name ?? '-',
            'image_url' => $imageUrl ?? '-',
            'video_url' => $request->video_url ?? '-',
            'url_tag' => $request->url_tag ?? '-'
        ]);

        return redirect('banners');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banners = Banners::find($id);
        $banners->delete();

        toast($banners->small_title.' was deleted!','success');
        return redirect('banners');
    }
}
