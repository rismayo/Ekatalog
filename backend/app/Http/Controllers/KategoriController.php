<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Umkm;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::with('umkm')->get(); // Ambil data kategori beserta relasi UMKM
        $umkms = Umkm::all(); // Ambil semua data UMKM
        return view('kategori.lihatkategori', compact('kategori', 'umkms'));
    }

    public function create()
    {
        $umkms = Umkm::all();
        return view('kategori.lihatkategori', compact('umkms'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'id_umkm' => 'required|exists:ms_umkm,id_umkm',
            'nama_kategori' => 'required',
        ]);

        try {
            
            Kategori::create([
                'id_umkm' => $request->id_umkm,
                'nama_kategori' => $request->nama_kategori,
            ]);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }

        return redirect()->route('kategori.lihatkategori')->with('success', 'Data Kategori berhasil ditambahkan');
    }

    // Edit UMKM record
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $umkms = Umkm::all(); 
        return view('kategori.edit', compact('kategori', 'umkms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_umkm' => 'required|exists:ms_umkm,id_umkm',
            'nama_kategori' => 'required',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->update([
            'id_umkm' => $request->id_umkm,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori.lihatkategori')->with('success', 'Data Kategori berhasil diperbarui');
    }

    public function destroy($id)
{
    try {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.lihatkategori')->with('success', 'Data kategori berhasil dihapus.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->route('kategori.lihatkategori')->with('error', 'Data kategori tidak dapat dihapus karena masih terkait dengan data lain.');
    }
}

}
