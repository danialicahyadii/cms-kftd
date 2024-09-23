<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::orderBy('id', 'desc')->paginate(10);
        confirmDelete('Delete Events!', "Are you sure you want to delete?");
        return view('apps.events.index', ['type_menu' => 'events', 'events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.events.create', ['type_menu' => 'events']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image ?? null;
        $imageName = null;
        $imageUrl = null;

        if($request->hasFile('image')){
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('events', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }

        Events::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'slug' => $request->slug,
            'slug_en' => $request->slug_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'place' => $request->place,
            'image_name' => $imageName,
            'image_url' => $imageUrl,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'start_event' => $request->start_event,
            'end_event' => $request->end_event
        ]);

        return redirect('events');
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $events = Events::find($id);
        return view('apps.events.edit', ['type_menu' => 'events', 'events' => $events]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $events = Events::find($id);

        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('events', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }

        $events->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'slug' => $request->slug,
            'slug_en' => $request->slug_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'place' => $request->place,
            'image_name' => $imageName ?? $events->image_name,
            'image_url' => $imageUrl ?? $events->image_url,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'start_event' => $request->start_event,
            'end_event' => $request->end_event
        ]);

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $events = Events::find($id);
        $events->delete();
        toast($events->title.' was deleted!','success');
        return redirect('events');
    }
}
