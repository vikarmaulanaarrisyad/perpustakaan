@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Peminjaman Buku</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">Content</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE/dist/js/pages/dashboard.js') }}"></script>
@endpush