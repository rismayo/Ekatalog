<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    // // Display the list of UMKM
    public function index(Request $request)
    {
         // Ambil data dari tabel `umkms`
         $products = Produk::all(); // Pastikan nama variabelnya `$umkms`
        
         // Kirim data ke view dengan `compact('product')`
         return view('produk.lihatproduk', compact('products'));
    }

     // Store a new UMKM record
     public function store(Request $request)
     {
        error_log($request->id_produk);
        error_log($request->id_user);
        error_log($request->id_kategori);
        error_log($request->id_umkm);
        error_log($request->nama_produk);
        error_log($request->deskripsi_produk);
        error_log($request->harga_produk);
        error_log($request->foto_produk);
        error_log($request->status);
        
        $request->validate([
            'id_produk' => 'required|unique:ms_produk,id_produk',
            'id_user' => 'required|integer',
            'id_kategori' => 'required|integer',
            'id_umkm' => 'required|integer',
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:aktif,tidakaktif',
        ]);
 
        try {
            // Upload foto jika ada
            $foto_produk = null;
            if ($request->hasFile('foto_produk')) {
                $foto_produk = $request->file('foto_produk')->store('foto_produk');
            }

            // Simpan data produk
            Produk::create([
                'id_produk' => $request->id_produk,
                'id_user' => $request->id_user,
                'id_kategori' => $request->id_kategori,
                'id_umkm' => $request->id_umkm,
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'harga_produk' => $request->harga_produk,
                'foto_produk' => $foto_produk,
                'status' => $request->status,
            ]);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
        
         // Redirect dengan pesan sukses
         return redirect()->route('produk.lihatproduk')->with('success', 'Data produk berhasil ditambahkan');
     }
 
     // Edit UMKM record
     public function edit($id)
     {
        $produkEdit = Produk::findOrFail($id); // Ambil data produk berdasarkan ID
         
         // Kirim data ke view untuk form edit
        return response()->json($produkEdit);
     }
 
      // Update Product record
     public function update(Request $request, $id)
     {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
            'status' => 'required|in:aktif,tidakaktif',
        ]);

        $product = Produk::findOrFail($id);

        // Upload foto baru jika ada
        //if ($request->hasFile('foto_produk')) {
            //$foto_produk = $request->file('foto_produk')->store('foto_produk');
            //$request->merge(['foto_produk' => $foto_produk]);
        //}
        
        $product->update($request->all());

        return redirect()->route('produk.lihatproduk')->with('success', 'Data produk berhasil diperbarui');
        }
    // Delete Product record
    public function destroy($id)
    {
        $product = Produk::findOrFail($id);
        $product->delete();

        return redirect()->route('produk.lihatproduk')->with('success', 'Data produk berhasil dihapus');
    }
}