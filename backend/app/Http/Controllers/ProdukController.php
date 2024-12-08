<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Umkm;
use App\Models\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
         $products = Produk::with('kategori', 'umkm', 'superadmin')->get();
         $kategori = Kategori::all();
         $umkms = Umkm::all();
         $superadmin = Superadmin::all();
         return view('produk.lihatproduk', compact('products', 'kategori', 'umkms', 'superadmin'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $umkms = Umkm::all();
        $superadmin = Superadmin::all();
        return view('produk.lihatproduk', compact('kategori', 'umkms', 'superadmin'));
    }

     public function store(Request $request)
     {
        
        $request->validate([
            'id_user' => 'required|exists:ms_user,id_user',
            'id_kategori' => 'required|exists:ms_kategori,id_kategori',
            'id_umkm' => 'required|exists:ms_umkm,id_umkm',
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:aktif,tidakaktif',
        ]);

        $foto_produk = null;
        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');

            // Membuat nama file unik dan memotong jika terlalu panjang
            $randomName = substr(uniqid('produk_', true), 0, 20) . '.' . $file->getClientOriginalExtension(); // Membatasi panjang menjadi 20 karakter

            // Tentukan direktori penyimpanan
            $file->storeAs('foto_produk', $randomName, 'public');

            // Simpan path relatif
            $foto_produk = 'foto_produk/' . $randomName;
        }

        Produk::create([
            'id_user' => $request->id_user,
            'id_kategori' => $request->id_kategori,
            'id_umkm' => $request->id_umkm,
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'foto_produk' => $foto_produk,
            'status' => $request->status,
        ]);

         return redirect()->route('produk.lihatproduk')->with('success', 'Data produk berhasil ditambahkan');
     }
 
     // Edit UMKM record
     public function edit($id)
     {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        $umkms = Umkm::all(); // Ambil data produk berdasarkan ID
        $superadmin = Superadmin::all();
        return view('produk.edit', compact('produk', 'kategori', 'umkms', 'superadmin'));
     }
 
      // Update Product record
     public function update(Request $request, $id)
     {

        $request->validate([
            'id_user' => 'required|exists:ms_user,id_user',
            'id_kategori' => 'required|exists:ms_kategori,id_kategori',
            'id_umkm' => 'required|exists:ms_umkm,id_umkm',
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:aktif,tidakaktif',
        ]);

        $product = Produk::findOrFail($id);
        $product -> id_user = $request->input('id_user');
        $product -> id_kategori = $request->input('id_kategori');
        $product -> id_umkm = $request->input('id_umkm');
        $product -> nama_produk = $request->input('nama_produk');
        $product -> deskripsi_produk = $request->input('deskripsi_produk');
        $product -> harga_produk = $request->input('harga_produk');
        $product -> foto_produk = $request->input('foto_produk');
        $product -> status = $request->input('status');

        // Memeriksa jika foto produk diupload
        if ($request->hasFile('foto_produk')) {
            // Menghapus foto lama jika ada
            if ($product->foto_produk && file_exists(storage_path('app/public/' . $product->foto_produk))) {
                unlink(storage_path('app/public/' . $product->foto_produk)); // Hapus foto lama
            }

            // Menyimpan foto produk baru
            $file = $request->file('foto_produk');
            $randomName = substr(uniqid('produk_', true), 0, 20) . '.' . $file->getClientOriginalExtension(); // Membuat nama unik
            $file->storeAs('foto_produk', $randomName, 'public'); // Menyimpan file ke storage

            // Menyimpan path relatif foto produk
            $product->foto_produk = 'foto_produk/' . $randomName;
        }
        $product->save();
        return redirect()->route('produk.lihatproduk')->with('success', 'Data Produk berhasil diperbarui');
    }
    // Delete Product record
    public function destroy($id)
    {
        $product = Produk::findOrFail($id); // Cari data berdasarkan ID
        $product->delete(); // Hapus data
        return redirect()->route('produk.lihatproduk')->with('success', 'Data Produk berhasil dihapus');
    }
}