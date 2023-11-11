<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        $customer = Customer::all();
        $kendaraan = Kendaraan::all();
        return view('order', ['order'=> $order, 'customer'=> $customer, 'kendaraan'=>$kendaraan]);
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
            'tanggal_order' => 'required',
            'customer_id' => 'required',
            'kendaraan_id' => 'required',
        ]);
        Order::create($data);

        return redirect()->route('order')->with('success', 'Order telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $order_input = $request->input('order');
        $order = Order::find($id);
        $order->kendaraan_id = $order_input; 
        $order->save();

        return redirect()->route('order')->with('success', 'Order telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('order')->with('success', 'Order telah dihapus');
    }
}
