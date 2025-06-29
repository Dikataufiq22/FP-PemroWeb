@extends('layouts.app')

@section('contents')
<body>
    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">Outdoor Equipment Catalog</h1>
                    <p class="lead">Temukan peralatan outdoor berkualitas tinggi untuk petualangan Anda. Dari tenda hingga peralatan mendaki, kami memiliki semua yang Anda butuhkan.</p>
                </div>
                <div class="col-lg-4">
                    <form method="GET" action="{{ route('catalog.index') }}" class="search-box">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari peralatan..." value="{{ request('search') }}" />
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog Content -->
    <section class="catalog-section py-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar Filters -->
                <div class="col-lg-3 mb-4">
                    <form method="GET" action="{{ route('catalog.index') }}" id="filterForm">
                        <div class="filters-sidebar">
                            <h3 class="mb-3 fw-bold">Filter Produk</h3>

                            <!-- Kategori -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Kategori</h6>
                                @php
                                    $categories = ['Tenda', 'Sleeping Gear', 'Tas & Carrier', 'Peralatan Masak', 'Peralatan Mendaki', 'Penerangan'];
                                @endphp
                                @foreach ($categories as $cat)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="category[]" value="{{ $cat }}" {{ in_array($cat, request('category', [])) ? 'checked' : '' }} onchange="document.getElementById('filterForm').submit()" />
                                        <label class="form-check-label">{{ $cat }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Harga -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Harga per Hari (Rp)</h6>
                                @php
                                    $prices = [
                                        '1000-5000' => 'Rp1.000 - Rp5.000',
                                        '6000-10000' => 'Rp6.000 - Rp10.000',
                                        '11000-20000' => 'Rp11.000 - Rp20.000',
                                        '20000+' => 'Rp20.000+',
                                    ];
                                @endphp
                                @foreach ($prices as $val => $label)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price_range[]" value="{{ $val }}" {{ in_array($val, request('price_range', [])) ? 'checked' : '' }} onchange="document.getElementById('filterForm').submit()" />
                                        <label class="form-check-label">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Brand -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Brand</h6>
                                @php
                                    $brands = ['eiger', 'rei', 'osprey', 'the north face', 'patagonia'];
                                @endphp
                                @foreach ($brands as $brand)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand[]" value="{{ $brand }}" {{ in_array($brand, request('brand', [])) ? 'checked' : '' }} onchange="document.getElementById('filterForm').submit()" />
                                        <label class="form-check-label text-capitalize">{{ $brand }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Ketersediaan -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Ketersediaan</h6>
                                @php
                                    $statuses = ['tersedia'];
                                @endphp
                                @foreach ($statuses as $status)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="availability[]" value="{{ $status }}" {{ in_array($status, request('availability', [])) ? 'checked' : '' }} onchange="document.getElementById('filterForm').submit()" />
                                        <label class="form-check-label text-capitalize">{{ $status }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="d-grid gap-2">
                                <a href="{{ route('catalog.index') }}" class="btn btn-outline-danger">Reset Filter</a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <span class="text-muted">Menampilkan {{ $products->total() }} produk</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <label class="me-2 fw-bold">Urutkan:</label>
                            <form method="GET" action="{{ route('catalog.index') }}">
                                <select class="form-select form-select-sm" style="width: auto" name="sort" onchange="this.form.submit()">
                                    <option value="">Terpopuler</option>
                                    <option value="Harga Terendah" {{ request('sort') == 'Harga Terendah' ? 'selected' : '' }}>Harga Terendah</option>
                                    <option value="Harga Tertinggi" {{ request('sort') == 'Harga Tertinggi' ? 'selected' : '' }}>Harga Tertinggi</option>
                                    <option value="Nama A-Z" {{ request('sort') == 'Nama A-Z' ? 'selected' : '' }}>Nama A-Z</option>
                                    <option value="Terbaru" {{ request('sort') == 'Terbaru' ? 'selected' : '' }}>Terbaru</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" />
                                        <div class="product-badge">Popular</div>
                                        <div class="product-actions">
                                            <button class="btn btn-light btn-sm"><i class="fas fa-heart"></i></button>
                                            <button class="btn btn-light btn-sm"><i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-category">{{ $product->category }}</div>
                                        <h5 class="product-title">{{ $product->name }}</h5>
                                        <div class="product-rating">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <span class="ms-1">{{ $product->rating }} from (24 reviews)</span>
                                        </div>
                                        <div class="product-price">
                                            <span class="price">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                            <span class="price-unit">/hari</span>
                                        </div>
                                        <div class="product-availability">
                                            <i class="fas fa-check-circle text-success"></i>
                                            <span>{{ $product->status }}</span>
                                        </div>
                                        <a href="{{ route('booking.index') }}" class="btn btn-success w-100">
                                            Sewa Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-5">
                        {{ $products->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection

@push('styles')
    @vite(['resources/css/catalog-styles.css'])
@endpush

@push('scripts')
    @vite(['resources/js/catalog-script.js'])
@endpush
