@extends('layouts.app')

@section('contents')
<div class="container py-5">
    <div class="row g-5 align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="bg-white rounded shadow p-4 d-flex justify-content-center align-items-center" style="height:380px;">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/default-product.png') }}" alt="{{ $product->name }}" class="img-fluid rounded shadow-sm" style="max-height:340px; max-width:90%; object-fit:contain; background:#fff; padding:1rem; display:block; margin:auto;">
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
            <div class="mb-2">
                <span class="badge bg-success">{{ $product->category }}</span>
                <span class="badge bg-secondary text-capitalize">{{ $product->brand }}</span>
                <span class="badge bg-info">Rating: {{ $product->rating }} <i class="fas fa-star text-warning"></i></span>
            </div>
            <div class="mb-3">
                <span class="fs-3 fw-bold text-success">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                <span class="text-muted">/hari</span>
            </div>
            <div class="mb-3">
                <strong>Status:</strong> 
                <span class="badge {{ $product->status == 'tersedia' ? 'bg-success' : 'bg-danger' }}">
                    {{ $product->status == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}
                </span>
            </div>
            <div class="mb-4">
                <h5>Spesifikasi / Deskripsi Produk</h5>
                <div class="bg-light rounded p-3 border">
                    <p class="mb-0">{{ $product->description }}</p>
                </div>
            </div>
            <a href="{{ url('booking') }}?q={{ $product->name }}" class="btn btn-success btn-lg w-100 mb-2">Sewa Sekarang</a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary w-100">Kembali ke Katalog</a>
        </div>
    </div>
</div>
@endsection
