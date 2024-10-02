<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        confirmDelete('Delete News!', "Are you sure you want to delete?");
        return view('apps.news.index', ['type_menu' => 'news', 'news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.news.create', ['type_menu' => 'news']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('images/news', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);

        }
        $news = News::create([
            "title" => $request->title,
            "slug" => $request->slug,
            "image_name" => $imageName ?? null,
            "image_url" => $imageUrl ?? null,
            "content" => $request->content,
            "title_en" => $request->title_en,
            "slug_en" => $request->slug_en,
            "image_name_en" => $imageName ?? null,
            "image_url_en" => $imageUrl ?? null,
            "content_en" => $request->content_en,
            "meta_title" => $request->meta_title,
            "meta_keywords" => $request->meta_keywords,
            "meta_description" => $request->meta_description,
        ]);

        return redirect('news');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('apps.news.edit', ['type_menu' => 'news', 'news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('images/news', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }
        $news->update([
            "title" => $request->title,
            "slug" => $request->slug,
            "image_name" => $imageName ?? $news->image_name,
            "image_url" => $imageUrl ?? $news->image_url,
            "content" => $request->content,
            "title_en" => $request->title_en,
            "slug_en" => $request->slug_en,
            "image_name_en" => $imageName ?? $news->image_name_en,
            "image_url_en" => $imageUrl ?? $news->image_url_en,
            "content_en" => $request->content_en,
            "meta_title" => $request->meta_title,
            "meta_keywords" => $request->meta_keywords,
            "meta_description" => $request->meta_description,
        ]);

        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        toast($news->name.' was deleted!','success');
        return redirect('news');
    }
}
