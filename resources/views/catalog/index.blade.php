@extends('layouts.app')

@section('contents')

    <body>
        <!-- Page Header -->
        <section class="page-header py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="display-5 fw-bold mb-3">Outdoor Equipment Catalog</h1>
                        <p class="lead">
                            Temukan peralatan outdoor berkualitas tinggi untuk petualangan
                            Anda. Dari tenda hingga peralatan mendaki, kami memiliki semua
                            yang Anda butuhkan.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari peralatan..." />
                                <button class="btn btn-success" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
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
                        <div class="filters-sidebar">
                            <h5 class="mb-3">Filter Produk</h5>

                            <!-- Category Filter -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Kategori</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="tents" />
                                    <label class="form-check-label" for="tents">
                                        Tenda & Shelter (24)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="sleeping" />
                                    <label class="form-check-label" for="sleeping">
                                        Sleeping Gear (18)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="backpacks" />
                                    <label class="form-check-label" for="backpacks">
                                        Tas & Carrier (32)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="cooking" />
                                    <label class="form-check-label" for="cooking">
                                        Peralatan Masak (15)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="climbing" />
                                    <label class="form-check-label" for="climbing">
                                        Peralatan Mendaki (21)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="lighting" />
                                    <label class="form-check-label" for="lighting">
                                        Penerangan (12)
                                    </label>
                                </div>
                            </div>

                            <!-- Price Range Filter -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Harga per Hari</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="price1" />
                                    <label class="form-check-label" for="price1"> $1 - $5 </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="price2" />
                                    <label class="form-check-label" for="price2">
                                        $6 - $10
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="price3" />
                                    <label class="form-check-label" for="price3">
                                        $11 - $20
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="price4" />
                                    <label class="form-check-label" for="price4"> $20+ </label>
                                </div>
                            </div>

                            <!-- Brand Filter -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Brand</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="osprey" />
                                    <label class="form-check-label" for="osprey"> Osprey </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="northface" />
                                    <label class="form-check-label" for="northface">
                                        The North Face
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="eiger" />
                                    <label class="form-check-label" for="eiger"> Eiger </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rei" />
                                    <label class="form-check-label" for="rei"> REI Co-op </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="patagonia" />
                                    <label class="form-check-label" for="patagonia">
                                        Patagonia
                                    </label>
                                </div>
                            </div>

                            <!-- Availability Filter -->
                            <div class="filter-group mb-4">
                                <h6 class="filter-title">Ketersediaan</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="available"
                                        checked />
                                    <label class="form-check-label" for="available">
                                        Tersedia Sekarang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="upcoming" />
                                    <label class="form-check-label" for="upcoming">
                                        Tersedia Minggu Depan
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-outline-secondary w-100">
                                Reset Filter
                            </button>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="col-lg-9">
                        <!-- Sort and View Options -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <span class="text-muted">Menampilkan 1-12 dari 122 produk</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <label class="me-2">Urutkan:</label>
                                <select class="form-select form-select-sm" style="width: auto">
                                    <option>Terpopuler</option>
                                    <option>Harga Terendah</option>
                                    <option>Harga Tertinggi</option>
                                    <option>Nama A-Z</option>
                                    <option>Terbaru</option>
                                </select>
                                <div class="ms-3">
                                    <button class="btn btn-outline-secondary btn-sm active">
                                        <i class="fas fa-th"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-list"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Products Grid -->
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4 mb-4">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt={{ $product->name }}
                                                class="img-fluid" />
                                            <div class="product-badge">Popular</div>
                                            <div class="product-actions">
                                                <button class="btn btn-light btn-sm">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                                <button class="btn btn-light btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </button>
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
                                                <span class="ms-1">{{ $product->rating }} from (24 reviews) </span>
                                            </div>
                                            <div class="product-price">
                                                <span class="price">Rp{{ $product->price }}</span>
                                                <span class="price-unit">/hari</span>
                                            </div>
                                            <div class="product-availability">
                                                <i class="fas fa-check-circle text-success"></i>
                                                <span>{{ $product->status }}</span>
                                            </div>
                                            <a href=""></a>
                                            <button class="btn btn-success w-100"
                                                onclick="window.location.href='/booking/booking.html'">
                                                Sewa Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Product pagination" class="mt-5">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">5</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </body>
@endsection

@push('styles')
    @vite(['resources/css/catalog-styles.css'])
@endpush
