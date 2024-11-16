<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    public function index(Request $request)
    {
         $kategori = Kategori::all();
         return view('kategori.lihatkategori', compact('kategori'));
    }

    public function store(Request $request)
    {

        error_log($request->id_kategori);
        error_log($request->id_umkm);
        error_log($request->nama_kategori);
       
        $request->validate([
            'id_kategori' => 'required|unique:ms_kategori,id_kategori',
            'id_umkm' => 'required',
            'nama_kategori' => 'required',
        ]);

        try {
            
            Kategori::create([
                'id_kategori' => $request->id_kategori,
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
        $umkmEdit = Kategori::findOrFail($id); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_umkm' => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect()->route('kategori.lihatkategori')->with('success', 'Data Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.lihatkategori')->with('success', 'Data Kategori berhasil dihapus');
    }
}
