<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{

    public function welcome()
    {
        $products = Produk::with('kategori')->get();
       

        return view('welcome', compact('products', 'otherProducts'));
    }

}