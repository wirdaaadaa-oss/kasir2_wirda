<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         //Filter search
        $jurusans = Jurusan::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_jurusan', 'like', "%{$search}%")
                      ->orWhere('kode_jurusan', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'nama_jurusan' =>'required|string|max:255',
            'kode_jurusan' => 'required|string|unique:jurusan|max:20',
            'keterangan'   => 'required|string|max:200',
            'status'       => 'required|enum',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
         // Validasi data
        $data = $request->validate([
            'nama_jurusan'        => 'required|string|max:255',
            'kode_jurusan'        => 'required|string|max:20|unique:jurusans,kode_jurusan,'.$jurusan->id, 
            'keterangan'          => 'required|string|max:100',
            'status'              => 'required|enum|max:50',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('succes', 'Data jurusan berhasil dihapus.');
    }
}