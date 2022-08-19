@extends('layouts.admin')

@section('title', 'Kategori')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kategori</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
            </div>
            <div class="card-body">

                <form class="d-flex justify-content-between">
                    <x-dropdown-table />
                    <x-filter-table />
                </form>

                <table class="table table-striped">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kategori</th>
                        <th width="25%">Jumlah Buku</th>
                        <th width="15%">
                            <i class="fas fa-cog"></i>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $key => $item)
                            <tr>
                                <td><x-number-table :key="$key" :model="$kategori" /></td>
                                <td>{{ $item->nama }}</td>
                                <td>0</td>
                                <td>
                                    <form action="{{ route('kategori.destroy',$item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Yakin ingin menghapus data?')"  class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="float-right mt-3">
                    {{ $kategori->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<x-toast />
