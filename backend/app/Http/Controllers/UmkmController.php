<?php
namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UmkmController extends Controller
{
    // Display the list of UMKM
    public function index(Request $request)
    {
         // Ambil data dari tabel `umkms`
         $umkms = Umkm::all(); // Pastikan nama variabelnya `$umkms`
        
         // Kirim data ke view dengan `compact('umkms')`
         return view('umkm.lihatumkm', compact('umkms'));
    }

    // Store a new UMKM record
    public function store(Request $request)
    {

        error_log($request->id_umkm);
            error_log($request->nama_umkm);
            error_log($request->pemilik);
            error_log($request->alamat);
            error_log($request->no_hp);
       
        $request->validate([
            'id_umkm' => 'required|unique:ms_umkm,id_umkm',
            'nama_umkm' => 'required',
            'pemilik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        try {
            
            Umkm::create([
                'id_umkm' => $request->id_umkm,
                'nama_umkm' => $request->nama_umkm,
                'pemilik' => $request->pemilik,
                'alamat_umkm' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }

    
        // Redirect dengan pesan sukses
        return redirect()->route('umkm.lihatumkm')->with('success', 'Data UMKM berhasil ditambahkan');
    }

    // Edit UMKM record
    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id); // Ambil data UMKM berdasarkan ID
        return view('umkm.edit', ['umkm' => $umkm]);
    }

    // Update UMKM record
    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm -> nama_umkm = $request->input('nama_umkm');
        $umkm -> pemilik = $request->input('pemilik');
        $umkm -> alamat_umkm = $request->input('alamat_umkm');
        $umkm -> no_hp = $request->input('no_hp');
        $umkm->save();

        return redirect('umkm.lihatumkm')->with('success', 'Data UMKM berhasil diperbarui');
    }

    // Delete UMKM record
    public function delete($id)
    {
        error_log('test');
        $test = Umkm::where('id_umkm', $id)->delete();
        return redirect()->route('umkm.lihatumkm')->with('success', 'Data UMKM berhasil dihapus');
    }
}
