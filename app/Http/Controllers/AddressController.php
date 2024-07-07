<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', Address::class);
        $addresses = Address::all();
        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        $this->authorize('create', Address::class);
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Address::class);
        Address::create($request->all());
        return redirect()->route('addresses.index');
    }

    public function show(Address $address)
    {
        $this->authorize('view', $address);
        return view('addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);
        $address->update($request->all());
        return redirect()->route('addresses.index');
    }

    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();
        return redirect()->route('addresses.index');
    }
}
