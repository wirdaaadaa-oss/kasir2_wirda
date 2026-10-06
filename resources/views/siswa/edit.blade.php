@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
                </div>

                <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="text" name="nis" class="form-control" id="nis" value="{{ $siswa->nis }}" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" id="jurusan" value="{{ $siswa->jurusan }}">
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $siswa->kelas }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $siswa->email }}">
                </div>

                <div class="form-group">
                    <label for="foto">Foto Siswa</label>
                    
                     @if($siswa->foto)
                        <div class="mb-2">
                            <p class="text-muted">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Lama" class="img-thumbnail" style="width: 150px;">
                        </div>
                     @endif

                    <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto" accept="image/*">
                    <small class="form-text text-muted">
                        Biarkan kosong jika tidak ingin mengubah foto. Format: JPG, PNG. Max 2MB.
                    </small>
                    
                     @error('foto')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop