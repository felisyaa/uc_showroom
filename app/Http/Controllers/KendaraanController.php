<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan',compact('kendaraan'));
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
                'model' => 'required',
                'jenis' => 'required',
                'tahun' => 'required',
                'jumlah_penumpang' => 'required',
                'manufaktur' => 'required',
                'harga' => 'required',
                
                'bahan_bakar' => 'nullable', 
                'luas_bagasi' => 'nullable', 
                'jumlah_roda' => 'nullable', 
                'luas_kargo' => 'nullable', 
                'ukuran_bagasi' => 'nullable',
                'kapasitas_bensin' => 'nullable', 
        ]);
        Kendaraan::create($data);

        return redirect()->route('kendaraan')->with('success', 'Kendaraan telah ditambahkan');
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
        $model_input = $request->input('model');
        $model = Kendaraan::find($id);
        $model->model = $model_input; 
        $model->save();

        $tahun_input = $request->input('tahun');
        $tahun = Kendaraan::find($id);
        $tahun->tahun = $tahun_input; 
        $tahun->save();

        $jumlah_penumpang_input = $request->input('jumlah_penumpang');
        $jumlah_penumpang = Kendaraan::find($id);
        $jumlah_penumpang->jumlah_penumpang = $jumlah_penumpang_input; 
        $jumlah_penumpang->save();

        $manufaktur_input = $request->input('manufaktur');
        $manufaktur = Kendaraan::find($id);
        $manufaktur->manufaktur = $manufaktur_input; 
        $manufaktur->save();

        $harga_input = $request->input('harga');
        $harga = Kendaraan::find($id);
        $harga->harga = $harga_input; 
        $harga->save();

    return redirect()->route('kendaraan')->with('success', 'Kendaraan telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();

        return redirect()->route('kendaraan')->with('success', 'Kendaraan telah dihapus');
    }
}
