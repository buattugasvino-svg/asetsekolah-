<?php

namespace App\Http\Controllers;

use App\Stok;
use App\Barang;
use Illuminate\Http\Request;

class stokcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data stok beserta data barang terkait
        $stok = Stok::with('barang')->get();
        return view('stok.index', compact('stok'));
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
        return view('stok.create', compact('barang'));
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
            'id_barang' => 'required|exists:barang,id_barang',
            'jumlah'    => 'required|integer|min:0',
        ]);

        Stok::create([
            'id_barang' => $request->id_barang,
            'jumlah'    => $request->jumlah,
        ]);

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stok = Stok::with('barang')->findOrFail($id);
        return view('stok.show', compact('stok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok = Stok::findOrFail($id);
        $barang = Barang::all();
        return view('stok.edit', compact('stok', 'barang'));
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
            'id_barang' => 'required|exists:barang,id_barang',
            'jumlah'    => 'required|integer|min:0',
        ]);

        $stok = Stok::findOrFail($id);
        $stok->update([
            'id_barang' => $request->id_barang,
            'jumlah'    => $request->jumlah,
        ]);

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stok = Stok::findOrFail($id);
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil dihapus!');
    }
}