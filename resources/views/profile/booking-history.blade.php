@extends('layouts.app')

@section('contents')
<div class="container py-5 min-vh-100">
    <h2 class="mb-4 fw-bold text-success"><i class="fas fa-history me-2"></i>Riwayat Booking</h2>
    @if($bookings->isEmpty())
        <div class="alert alert-info">Belum ada booking yang tercatat.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered align-middle bg-white">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Produk</th>
                    <th>Tanggal Booking</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ $booking->product->image ? asset('storage/'.$booking->product->image) : asset('assets/Logo.png') }}" alt="{{ $booking->product->name }}" width="48" height="48" style="object-fit:contain; background:#f8f9fa; border-radius:8px;">
                            <span>{{ $booking->product->name }}</span>
                        </div>
                    </td>
                    <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $booking->start_date->format('d M Y') }}</td>
                    <td>{{ $booking->end_date->format('d M Y') }}</td>
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
                    <td>
                        <a href="{{ route('booking.detail', $booking->id) }}" class="btn btn-outline-success btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
