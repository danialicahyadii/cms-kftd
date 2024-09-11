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
        return view('apps.staffs.index', ['type_menu' => 'staffs']);
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
        //
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
    public function edit(Staffs $staffs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staffs $staffs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staffs $staffs)
    {
        //
    }
}
