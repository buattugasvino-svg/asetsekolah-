<?php

namespace App\Http\Controllers;

use App\Penyusutan;
use App\Barang;
use Illuminate\Http\Request;

class penyusutancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data penyusutan beserta data barang terkait
        $penyusutan = Penyusutan::with('barang')->get();
        return view('penyusutan.index', compact('penyusutan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil daftar barang untuk pilihan dropdown
        $barang = Barang::all();
        return view('penyusutan.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang'        => 'required|exists:barang,id_barang',
            'nilai_penyusutan' => 'required|numeric|min:0',
        ]);

        Penyusutan::create([
            'id_barang'        => $request->id_barang,
            'nilai_penyusutan' => $request->nilai_penyusutan,
        ]);

        return redirect()->route('penyusutan.index')->with('success', 'Data penyusutan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penyusutan = Penyusutan::with('barang')->findOrFail($id);
        return view('penyusutan.show', compact('penyusutan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penyusutan = Penyusutan::findOrFail($id);
        $barang = Barang::all();
        return view('penyusutan.edit', compact('penyusutan', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang'        => 'required|exists:barang,id_barang',
            'nilai_penyusutan' => 'required|numeric|min:0',
        ]);

        $penyusutan = Penyusutan::findOrFail($id);
        $penyusutan->update([
            'id_barang'        => $request->id_barang,
            'nilai_penyusutan' => $request->nilai_penyusutan,
        ]);

        return redirect()->route('penyusutan.index')->with('success', 'Data penyusutan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyusutan = Penyusutan::findOrFail($id);
        $penyusutan->delete();

        return redirect()->route('penyusutan.index')->with('success', 'Data penyusutan berhasil dihapus!');
    }
}