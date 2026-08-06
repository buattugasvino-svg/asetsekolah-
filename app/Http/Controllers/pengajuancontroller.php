<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\Barang;
use Illuminate\Http\Request;

class pengajuancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data pengajuan beserta data barang terkait
        $pengajuan = Pengajuan::with('barang')->get();
        return view('pengajuan.index', compact('pengajuan'));
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
        return view('pengajuan.create', compact('barang'));
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
            'deskripsi' => 'required|string',
            'status'    => 'nullable|string|max:20',
        ]);

        Pengajuan::create([
            'id_barang' => $request->id_barang,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status ?? 'Pending',
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengajuan = Pengajuan::with('barang')->findOrFail($id);
        return view('pengajuan.show', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $barang = Barang::all();
        return view('pengajuan.edit', compact('pengajuan', 'barang'));
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
            'deskripsi' => 'required|string',
            'status'    => 'required|string|max:20',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
            'id_barang' => $request->id_barang,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status,
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil dihapus!');
    }
}