<?php
namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    // Display the list of UMKM
    public function index(Request $request)
    {
        $search = $request->input('katakunci');
        $ms_umkm = umkm::when($search, function ($query, $search) {
            $query->where('nama_umkm', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
        })->get();

        return view('umkm.lihatumkm', compact('ms_umkm'));
    }

    // Store a new UMKM record
    public function store(Request $request)
    {
        $request->validate([
            'id_umkm' => 'required|unique:ms_umkm,id_umkm',
            'nama_umkm' => 'required',
            'pemilik' => 'required',
            'alamat_umkm' => 'required',
            'no_HP' => 'required|numeric',
        ]);

        dd($request->all());
        
        umkm::create($request->all());
        return redirect()->route('umkm.lihatumkm')->with('success', 'Data UMKM berhasil ditambahkan');
    }

    // Edit UMKM record
    public function edit($id)
    {
        $umkm = umkm::findOrFail($id);
        return view('umkm.edit', compact('umkm.lihatumkm'));
    }

    // Update UMKM record
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'pemilik' => 'required',
            'alamat_umkm' => 'required',
            'no_HP' => 'required|numeric',
        ]);

        $umkm = umkm::findOrFail($id);
        $umkm->update($request->all());
        return redirect()->route('umkm.lihatumkm')->with('success', 'Data UMKM berhasil diperbarui');
    }

    // Delete UMKM record
    public function destroy($id)
    {
        $umkm = umkm::findOrFail($id);
        $umkm->delete();
        return redirect()->route('umkm.lihatumkm')->with('success', 'Data UMKM berhasil dihapus');
    }
}
