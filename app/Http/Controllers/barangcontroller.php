<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use Illuminate\Http\Request;

class barangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data barang beserta relasi kategorinya
        $barang = Barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil data kategori untuk pilihan dropdown di form tambah
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_barang' => 'required|string|max:100',
            'kode_barang' => 'required|string|max:20|unique:barang,kode_barang',
            'kondisi'     => 'required|string|max:30',
        ]);

        // Simpan data ke database
        Barang::create([
            'id_kategori' => $request->id_kategori,
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kondisi'     => $request->kondisi,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan detail 1 barang beserta relasinya
        $barang = Barang::with(['kategori', 'stok', 'penyusutan', 'pengajuan'])->findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
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
        $barang = Barang::findOrFail($id);

        // Validasi input (kode_barang diabaikan untuk ID barang yang sedang di-edit)
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_barang' => 'required|string|max:100',
            'kode_barang' => 'required|string|max:20|unique:barang,kode_barang,' . $id . ',id_barang',
            'kondisi'     => 'required|string|max:30',
        ]);

        // Update data
        $barang->update([
            'id_kategori' => $request->id_kategori,
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kondisi'     => $request->kondisi,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus!');
    }
}