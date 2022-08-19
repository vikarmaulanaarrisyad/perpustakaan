@extends('layouts.admin')

@section('title', 'Kategori')

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
<li class="breadcrumb-item active">Tambah Kategori</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('kategori.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Kategori</label>
                        <input id="nama" class="form-control" type="text" name="nama" autocomplete="off">
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