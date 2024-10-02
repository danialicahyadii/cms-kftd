<?php

namespace App\Http\Controllers;

use App\Models\CorporateGovernances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CorporateGovernancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corporateGovernances = CorporateGovernances::paginate(5);
        confirmDelete('Delete !', "Are you sure you want to delete?");

        return view('apps.corporate_governances.index', ['type_menu' => 'corporate governances', 'corporateGovernances' => $corporateGovernances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.corporate_governances.create', ['type_menu' => 'corporate governances']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file ?? null;

        if($file){
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('files/corporate-governances', $fileName, 'public');
            $fileLink = asset('storage/' . $filePath);
        }

        CorporateGovernances::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'content' => $request->content_id,
            'content_en' => $request->content_en,
            'filename' => $fileName ?? null,
            'file_link' => $fileLink ?? null,
            'filename_en' => $fileName ?? null,
            'file_link_en' => $fileLink ?? null
        ]);

        return redirect('corporate-governances');
    }

    /**
     * Display the specified resource.
     */
    public function show(CorporateGovernances $corporateGovernances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $corporateGovernances = CorporateGovernances::find($id);
        return view('apps.corporate_governances.edit', ['type_menu' => 'corporate governances', 'corporateGovernances' => $corporateGovernances]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $corporateGovernances = CorporateGovernances::find($id);

        if($request->file('file')){
            $file = $request->file('file');
            if ($corporateGovernances->filename && Storage::disk('public')->exists('files/corporate-governances/' . $corporateGovernances->filename)) {
                Storage::disk('public')->delete('corporate-governances/' . $corporateGovernances->filename);
            }
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('files/corporate-governances', $fileName, 'public');
            $fileLink = asset('storage/' . $filePath);
        }

        $corporateGovernances->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'content' => $request->content_id,
            'content_en' => $request->content_en,
            'filename' => $fileName ?? $corporateGovernances->filename,
            'file_link' => $fileLink ?? $corporateGovernances->file_link,
            'filename_en' => $fileName ?? $corporateGovernances->filename_en,
            'file_link_en' => $fileLink ?? $corporateGovernances->file_link_en
        ]);

        return redirect('corporate-governances');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $corporateGovernances = CorporateGovernances::find($id);
        $corporateGovernances->delete();

        toast($corporateGovernances->title.' was deleted!','success');

        return redirect('corporate-governances');

    }
}
