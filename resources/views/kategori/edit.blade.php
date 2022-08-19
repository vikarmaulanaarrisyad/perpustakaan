@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
<li class="breadcrumb-item active">Edit Kategori</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Kategori</label>
                        <input id="nama" class="form-control" type="text" name="nama" autocomplete="off" value="{{ $kategori->nama }}">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <a href="{{ route('kategori.index') }}" type="submit" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection