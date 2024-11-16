<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    // Display the list of Admins
    public function index(Request $request)
    {
        // Ambil data dari tabel `ms_user`
        $admins = Admin::all();

        // Kirim data ke view dengan `compact('admins')`
        return view('superadmin.lihatadmin', compact('admins'));
    }

    // Store a new Admin record
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|unique:ms_user,id_user',
            'id_umkm' => 'required|integer',
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email|unique:ms_user,email',
            'password' => 'required|string|min:6',
            'level' => 'required|in:superadmin,pengelola,pemilik',
            'status' => 'required|in:aktif,tidakaktif',
        ]);

        try {
            // Simpan data admin
            Admin::create([
                'id_user' => $request->id_user,
                'id_umkm' => $request->id_umkm,
                'nama_user' => $request->nama_user,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Hash password
                'level' => $request->level,
                'status' => $request->status,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('superadmin.lihatadmin')->with('success', 'Admin berhasil ditambahkan');
    }

    // Edit Admin record
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        // Kirim data ke view untuk form edit
        return view('superadmin.edit', compact('admin'));
    }

    // Update Admin record
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_umkm' => 'required|integer',
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email|unique:ms_user,email,' . $id . ',id_user',
            'password' => 'nullable|string|min:6',
            'level' => 'required|in:superadmin,pengelola,pemilik',
            'status' => 'required|in:aktif,tidakaktif',
        ]);

        $admin = Admin::findOrFail($id);

        $data = $request->all();

        // Hash password jika ada perubahan
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $admin->update($data);

        return redirect()->route('superadmin.lihatadmin')->with('success', 'Admin berhasil diperbarui');
    }

    // Delete Admin record
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('superadmin.lihatadmin')->with('success', 'Admin berhasil dihapus');
    }
}
