<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::latest()->get();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|string|max:20',
            'judul_buku' => 'required|string|max:150',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string|max:20',
            'lokasi' => 'required|string|max:50',
        ], [
        'kode_buku.required' => 'Kode buku harus diisi.',
        'kode_buku.max' => 'Kode buku maksimal 20 karakter.',
        'judul_buku.required' => 'Judul buku harus diisi.',
        'judul_buku.max' => 'Judul buku maksimal 150 karakter.',
        'jumlah.required' => 'Jumlah harus diisi.',
        'jumlah.integer' => 'Jumlah harus berupa angka.',
        'satuan.required' => 'Satuan harus diisi.',
        'satuan.max' => 'Satuan maksimal 20 karakter.',
        'lokasi.required' => 'Lokasi harus diisi.',
        'lokasi.max' => 'Lokasi maksimal 50 karakter.',
        ]);
        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'lokasi' => $request->lokasi,
        ]);
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate ([
            'kode_buku' => 'required|string|max:20',
            'judul_buku' => 'required|string|max:150',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string|max:20',
            'lokasi' => 'required|string|max:50',
    ]);
        $buku = Buku::findorFail($id);
        $buku->update([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'lokasi' => $request->lokasi,
    ]);
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui.');
    
    }

    public function destroy(string $id)
    {
        $buku = Buku::findorFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus.');
    }
}
