<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperadminController extends Controller
{
    public function index(Request $request)
    {
         $superadmin = Superadmin::all(); 
        
         return view('superadmin.lihatsuperadmin', compact('superadmin'));
    }

     public function store(Request $request)
     {
       
        
        $request->validate([
            'id_umkm' => 'required|integer',
            'nama_user' => 'required|string|max:50',
            'email' => 'required|email|unique:ms_user,email',
            'level' => 'required|in:Superadmin,Admin',
            'status' => 'required|in:Aktif,Tidak aktif',
        ]);
 
        try {
            Superadmin::create([
                'id_umkm' => $request->id_umkm,
                'nama_user' => $request->nama_user,
                'email' => $request->email,
                'level' => $request->level,
                'status' => $request->status,
            ]);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
        
         // Redirect dengan pesan sukses
         return redirect()->route('superadmin.lihatsuperadmin')->with('success', 'Data Admin berhasil ditambahkan');
         
     }
 
     public function edit($id)
     {
         $superadmin = Superadmin::findOrFail($id);
         
         // Kirim data ke view untuk form edit
        return view('superadmin.edit', compact('superadmin'));
     }
 
      // Update Product record
     public function update(Request $request, $id)
     {
        $request->validate([
            'id_umkm' => 'required|integer',
            'nama_user' => 'required|string|max:50',
            'email' => 'required|email|unique:ms_user,email',
            'password' => 'required|string|min:6',
            'level' => 'required|in:Superadmin,Admin',
            'status' => 'required|in:Aktif,Tidak aktif',
        ]);

        $superadmin = Superadmin::findOrFail($id);
        
        $superadmin->update($request->all());

        return redirect()->route('superadmin.lihatsuperadmin')->with('success', 'Data Admin berhasil diperbarui');
        }
    // Delete Product record
    public function delete($id)
    {
        error_log('test');
        $test = SuperAdmin::where('id_user', $id)->delete();
        return redirect()->route('superadmin.lihatsuperadmin')->with('success', 'Data SuperAdmin berhasil dihapus');
    }
}