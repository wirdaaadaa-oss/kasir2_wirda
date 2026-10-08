@extends('adminlte::page')

@section('title', 'Edit Jurusan')

@section('content_header')
    <h1>Edit Jurusan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan"
                        value="{{ $jurusan->nama_jurusan }}" required>
                </div>

                <div class="form-group">
                    <label for="kode_jurusan">Kode Jurusan</label>
                    <input type="text" name="kode_jurusan" class="form-control" id="kode_jurusan"
                        value="{{ $jurusan->kode_jurusan }}" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan"
                        value="{{ $jurusan->keterangan }}">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" id="status" value="{{ $jurusan->status }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop