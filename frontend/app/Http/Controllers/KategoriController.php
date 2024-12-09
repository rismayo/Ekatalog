<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

class KategoriController extends Controller
{

    public function welcome()
    {
        $categories = Kategori::with('produk')->get(); // Mengambil kategori dan produk terkait
        $products = Produk::all(); // Semua produk

        return view('welcome', compact('categories', 'products'));
    }

}