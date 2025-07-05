@extends('layouts.app')

@section('contents')
<div class="container py-5 min-vh-100">
    <a href="{{ route('profile.booking-history') }}" class="btn btn-outline-success mb-4"><i class="fas fa-arrow-left me-2"></i>Kembali ke Riwayat</a>
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="fas fa-receipt me-2"></i>Detail Booking</h4>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <img src="{{ $booking->product->image ? asset('storage/'.$booking->product->image) : asset('assets/Logo.png') }}" alt="{{ $booking->product->name }}" class="img-fluid rounded mb-3" style="object-fit:contain; background:#f8f9fa; max-height:220px;">
                    <h5 class="fw-bold">{{ $booking->product->name }}</h5>
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th class="w-50">Tanggal Booking</th>
                            <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>{{ $booking->start_date->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>{{ $booking->end_date->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($booking->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($booking->status === 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($booking->status === 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>Rp{{ number_format($booking->total_price,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <th>Metode Pengambilan</th>
                            <td>{{ $booking->pickup_method }}</td>
                        </tr>
                        @if($booking->delivery_address)
                        <tr>
                            <th>Alamat Pengantaran</th>
                            <td>{{ $booking->delivery_address }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>No. Identitas</th>
                            <td>{{ $booking->id_number }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
