@extends('adminlte::page')

@section('title', 'Edit Jenjang')

@section('content_header')
    <h1>Edit Jenjang</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jenjang.update', $jenjang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_jenjang">Nama Jenjang</label>
                    <input type="text" name="nama_jenjang" class="form-control" id="nama_jenjang"
                        value="{{ $jenjang->nama_jenjang }}" required>
                </div>
                
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan"
                        value="{{ $jenjang->keterangan }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop