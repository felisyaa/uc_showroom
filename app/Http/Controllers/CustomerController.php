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
        $customer = Customer::all();
        return view('customer',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'id_card'=> 'required'
        ]);
        Customer::create($data);

        return redirect()->route('customer')->with('success', 'Customer telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_input = $request->input('nama');
        $nama = Customer::find($id);
        $nama->nama = $nama_input; 
        $nama->save();

        $alamat_input = $request->input('alamat');
        $alamat = Customer::find($id);
        $alamat->alamat = $alamat_input; 
        $alamat->save();

        $telpon_input = $request->input('telpon');
        $telpon = Customer::find($id);
        $telpon->telpon = $telpon_input; 
        $telpon->save();

        $id_card_input = $request->input('id_card');
        $id_card = Customer::find($id);
        $id_card->id_card = $id_card_input; 
        $id_card->save();


        return redirect()->route('customer')->with('success', 'Customer telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customer')->with('success', 'Customer telah dihapus');
    }
}
