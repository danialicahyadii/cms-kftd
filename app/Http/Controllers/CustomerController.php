<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::paginate(10);
        confirmDelete('Delete Customer!', "Are you sure you want to delete?");

        return view('apps.customer.index', ['type_menu' => 'customer', 'customer' => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.customer.create', ['type_menu' => 'customer']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image ?? null;

        $lastId = Customer::latest('id')->value(column: 'id') ?? 0;
        $id = $lastId + 1;

        if($request->hasFile('image')){
            $image = $id.'. '.$request->image->getClientOriginalName();
            $request->image->storeAs('customer', $image, 'public');
        }
        Customer::create([
            'name_customer' => $request->name_customer,
            'category' => $request->category,
            'image' => $image,
        ]);

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('apps.customer.edit', ['type_menu' => 'customer', 'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        if($request->hasFile('image')){
            $image = $customer->id.'. '.$request->image->getClientOriginalName();
            $request->image->storeAs('customer', $image, 'public');
        }

        $customer->update([
           'name_customer' => $request->name_customer,
           'category' => $request->category,
           'image' => $image ?? $customer->image,
        ]);

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        toast($customer->name_customer.' was deleted!','success');

        return redirect('customer');
    }
}
