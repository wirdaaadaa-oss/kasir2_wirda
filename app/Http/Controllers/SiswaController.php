<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
public function index(Request $request)
    {
	    //Filter search
        $siswas = Siswa::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_siswa', 'like', "%{$search}%")
                      ->orWhere('nis', 'like', "%{$search}%");
            })
            ->paginate(10); 

        return view('siswa.index', compact('siswas'));
    }
    
     public function create()
    {
        return view('siswa.create');
    }
    
    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nis'        => 'required|string|unique:siswas|max:20',
            'jurusan'    => 'required|string|max:100',
            'kelas'      => 'required|string|max:50',
            'email'      => 'nullable|email|unique:siswas',
            'foto'       => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
         if($request->hasFile('foto')){
            $data['foto'] = $request->file('foto')->store('foto-siswa', 'public');
         }
        // Simpan data langsung (tanpa perlu definisikan satu-satu)
        Siswa::create($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }
    
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit',compact('siswa'));
    }
    
    public function update(Request $request, Siswa $siswa)
    {
        // Validasi data
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nis'        => 'required|string|max:20|unique:siswas,nis,'.$siswa->id, 
            'jurusan'    => 'required|string|max:100',
            'kelas'      => 'required|string|max:50',
            'email'      => 'nullable|email|unique:siswas,email,'.$siswa->id,
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            // Hapus foto LAMA jika ada
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }
             $data['foto'] = $request->file('foto')->store('foto-siswa', 'public');
        }
        // Update data langsung
        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }
    
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }
    
    public function destroy(Siswa $siswa)
    {
        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
    
}