@extends('adminlte::page')

@section('title', 'Jurusan')

@section('content_header')
    <h1>Jurusan</h1>
@stop

@section('content')
    <div class="card">
        {{-- Header dengan Style AdminLTE (Title di kiri, Tools di kanan) --}}
        <div class="card-header">
            <h3 class="card-title">Daftar Jurusan</h3>
            <div class="card-tools">
                <!-- <a href="{{ route('siswa.cetak-pdf') }}" class="btn btn-danger btn-sm" target="_blank">
                    <i class="fas fa-file-pdf"></i> Cetak PDF
                </a> -->
                <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Jurusan
                </a>
            </div>
        </div>
        
        {{-- Bagian Pencarian & Alert (Diberi padding agar rapi) --}}
        <div class="card-body pb-0">
            <form action="{{ route('jurusan.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama Jurusan atau Kode Jurusan" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        {{-- Bagian Tabel (Style disamakan dengan Data Guru: p-0, table-hover, text-nowrap) --}}
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Jurusan</th>
                        <th>Kode Jurusan</th>
                        <th>Keterangan</th> 
                        <th>Status</th>   
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jurusans as $key => $jurusan)
                    <tr>
                        <td>{{ $jurusans->firstItem() + $key }}</td>
                        <td>{{ $jurusan->nama_jurusan }}</td>
                        <td>{{ $jurusan->kode_jurusan }}</td>
                        <td>{{ $jurusan->keterangan }}</td> 
                        <td>{{ $jurusan->status }}</td>   
                        <td>

                            {{-- Tombol Aksi disinkronkan stylenya (btn-sm, icon only) --}}
                            <a class="btn btn-info btn-sm" href="{{ route('jurusan.show', $jurusan->id) }}" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {!! $jurusans->appends(request()->query())->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@stop