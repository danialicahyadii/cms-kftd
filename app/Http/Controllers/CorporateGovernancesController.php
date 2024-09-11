<?php

namespace App\Http\Controllers;

use App\Models\CorporateGovernances;
use Illuminate\Http\Request;

class CorporateGovernancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corporateGovernances = CorporateGovernances::paginate(5);
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
        //
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
    public function edit(CorporateGovernances $corporateGovernances)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CorporateGovernances $corporateGovernances)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CorporateGovernances $corporateGovernances)
    {
        //
    }
}
