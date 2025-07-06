@extends('layouts.app')

@section('contents')
<div class="container py-5 min-vh-100">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('assets/Logo.png') }}" alt="{{ $product->name }}" class="img-fluid rounded mb-3" style="object-fit:contain; background:#f8f9fa; max-height:320px;">
        </div>
        <div class="col-md-7">
            <h2 class="fw-bold mb-2">{{ $product->name }}</h2>
            <div class="mb-2 text-muted">Kategori: {{ $product->category }}</div>
            <div class="mb-2">Harga: <span class="fw-bold text-success">Rp{{ number_format($product->price,0,',','.') }}</span> /hari</div>
            <div class="mb-2">Status: <span class="badge bg-success">{{ $product->status }}</span></div>
            <div class="mb-3">Deskripsi:<br>{{ $product->description }}</div>
            <a href="{{ url('booking') }}?q={{ $product->name }}" class="btn btn-success">Sewa Sekarang</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h4 class="fw-bold mb-3 text-success">Review Pengguna</h4>
            @if($product->reviews->isEmpty())
                <div class="alert alert-info">Belum ada review untuk produk ini.</div>
            @else
                @foreach($product->reviews as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <strong>{{ $review->user->name }}</strong>
                                <span class="ms-3 text-warning">
                                    @for($i=1;$i<=5;$i++)
                                        <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </span>
                                <span class="ms-auto text-muted small">{{ $review->created_at->format('d M Y') }}</span>
                            </div>
                            <div>{{ $review->review }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
