@extends('adminlte::page')

@section('title', 'Tambah Jurusan')

@section('content_header')
    <h1>Tambah Jurusan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror"
                        id="nama_jurusan" required value="{{ old('nama_jurusan') }}">
                    @error('nama_jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nis">Kode Jurusan</label>
                    <input type="text" name="kode_jurusan"
                        class="form-control @error('kode_jurusan') is-invalid @enderror" id="nis" required
                        value="{{ old('kode_jurusan') }}">
                    @error('kode_jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jurusan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                        id="keterangan" required placeholder="Contoh: Rekayasa Perangkat Lunak"
                        value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelas">Status</label>
                    <input type="text" name="status" class="form-control @error('status') is-invalid @enderror"
                        id="status" required placeholder="Contoh: 12-RPL-A" value="{{ old('status') }}">
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop