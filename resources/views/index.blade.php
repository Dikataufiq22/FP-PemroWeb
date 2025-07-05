@extends('layouts.app')
@vite('resources/js/app.js')
@section('contents')

    <div>
        <!-- Hero Section -->
        <section id="home" class="hero-section relative" style="background-image:url({{ url('assets/bg.jpg') }})">
            <div class="hero-overlay spacing-container">
                <div class="container relative">
                    <div class="row align-items-center min-vh-100 pt-5">
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-bold text-white mb-4">
                                Solusi Praktis untuk kebutuhan Outdoormu.
                            </h1>
                            <p class="lead text-white mb-4">
                                Temukan pengalaman outdoor yang tak terlupakan dengan peralatan berkualitas tinggi.
                                Dari pendakian gunung hingga camping, kami menyediakan semua yang Anda butuhkan
                                untuk petualangan luar biasa.
                            </p>
                            <div class="d-flex gap-3 flex-wrap">
                                <button class="btn btn-success btn-lg px-4"
                                    onclick="window.location.href='booking/'">Sewa Sekarang</button>

                            </div>
                        </div>
                    </div>
                        <img src="{{ asset('assets/Talent.png') }}" alt="Hiker" class="w-1/2 h-auto absolute right-0 -bottom-[65px] max-lg:hidden" style="z-index: 1;">
                </div>
            </div>
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
        </section>

        <!-- Brand Partners -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 col-md-2 text-center mb-3">
                        <img src="{{ asset('assets/osprey.png') }}" alt="Osprey" class="img-fluid brand-logo">
                    </div>
                    <div class="col-6 col-md-2 text-center mb-3">
                        <img src="{{ asset('assets/arcteryx.png') }}" alt="Arc'teryx" class="img-fluid brand-logo">
                    </div>
                    <div class="col-6 col-md-2 text-center mb-3">
                        <img src="{{ asset('assets/tnf.png') }}" alt="The North Face" class="img-fluid brand-logo">
                    </div>
                    <div class="col-6 col-md-2 text-center mb-3">
                        <img src="{{ asset('assets/columbia.png') }}" alt="Patagonia" class="img-fluid brand-logo">
                    </div>
                    <div class="col-6 col-md-2 text-center mb-3">
                        <img src="{{ asset('assets/arei.png') }}" alt="REI" class="img-fluid brand-logo">
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us -->
        <section id="about" class="py-5 spacing-container">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="{{ asset('assets/bg2.jpg') }}" alt="Tentang Kami" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-6 text-center">
                        <h2 class="fw-bold mb-4 text-center display-6">About Us</h2>
                        <p class="mb-3 text-justify" style="text-indent: 2em;">
                            <strong>ExploreX</strong> adalah penyedia layanan sewa perlengkapan outdoor terpercaya yang berdedikasi 
                            untuk mendukung petualangan Anda di alam bebas. Kami menyediakan berbagai perlengkapan outdoor berkualitas 
                            tinggi termasuk tenda, matras, carrier, kompor portabel, dan perlengkapan berkemah lainnya untuk memenuhi 
                            kebutuhan aktivitas luar ruang Anda mulai dari mendaki gunung, berkemah di pantai, menjelajah hutan, 
                            dan masih banyak lagi.
                        </p>
                        <p class="mb-3 text-justify">
                            Didirikan oleh para pecinta alam, kami memahami betapa pentingnya peralatan yang aman, nyaman, dan praktis 
                            saat menjelajah alam. Oleh karena itu, semua peralatan kami dirawat secara rutin dan siap digunakan demi
                             memberikan pengalaman terbaik bagi pelanggan kami.
                        </p>
                        <p class="text-success fw-bold text-justify">
                            Temukan kebebasan menjelajah tanpa harus membeli. Cukup sewa di ExploreX!
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Product Catalog -->
        <section id="catalog" class="py-5 spacing-container">
            <div class="container spacing-container">
                <div class="row mb-5">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-3 display-6">Choose the item that suits you</h2>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="/catalog" class="text-success text-decoration-none">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center d-flex flex-column">
                                    <div class="mb-3" style="height:220px;display:flex;align-items:center;justify-content:center;background:#fff;">
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/default-product.png') }}" alt="{{$product->name}}" style="max-height:200px;max-width:100%;object-fit:contain;">
                                    </div>
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <span class="text-success fw-bold fs-4">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                        <span class="text-muted ms-2">/day</span>
                                    </div>
                                    <div class="d-flex justify-content-center gap-2 mb-3">
                                        <span class="badge bg-light text-dark">{{$product->brand}}</span>
                                        <span class="badge bg-light text-dark">{{$product->status}}</span>
                                    </div>
                                    <a href="/product-detail/{{$product->id}}" class="btn btn-success w-100 mt-auto">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- How to Rent Process -->
        <section id="how-to-rent" class="py-5 spacing-container">
            <div class="container">
                <h2 class="text-center fw-bold mb-5 display-6">How to Rent</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                1
                            </div>
                            <div>
                                <h5 class="fw-bold">Pilih item yang diperlukan</h5>
                                <p class="text-muted">
                                    Jelajahi katalog kami dan pilih perlengkapan luar ruangan yang Anda butuhkan, seperti Tenda &
                                    Kasur, Kantong Tidur, Tas Pembawa & Ransel, Tas, Peralatan Memasak Portabel, dan perlengkapan 
                                    lainnya sesuai dengankebutuhan petualangan Anda.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                2
                            </div>
                            <div>
                                <h5 class="fw-bold">Periksa Ketersediaan</h5>
                                <p class="text-muted">
                                    Periksa ketersediaan peralatan pada tanggal sewa yang Anda 
                                    inginkan. Kami akan menunjukkan ketersediaan secara real-time 
                                    dan membantu Anda memilih peralatan yang sempurna untuk perjalanan Anda.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                3
                            </div>
                            <div>
                                <h5 class="fw-bold">Buat Pemesanan</h5>
                                <p class="text-muted">
                                    Isi formulir pemesanan, kemudian isi detail pemesanan. Pilih metode pembayaran & 
                                    amankan penyewaan Anda. Terima email konfirmasi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                4
                            </div>
                            <div>
                                <h5 class="fw-bold">Konfirmasi</h5>
                                <p class="text-muted">
                                   Setelah mengisi formulir, Anda akan menerima konfirmasi melalui email.
                                    Kami juga akan menghubungi Anda 1 hari sebelumnya untuk pengambilan atau pengiriman.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                5
                            </div>
                            <div>
                                <h5 class="fw-bold">Ambil barang itu</h5>
                                <p class="text-muted">
                                    Datanglah ke lokasi kami pada tanggal yang disepakati atau tunggu pengiriman 
                                    jika Anda memilih opsi pengiriman. Tim kami akan memberikan penjelasan singkat 
                                    tentang cara menggunakan peralatan tersebut.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                6
                            </div>
                            <div>
                                <h5 class="fw-bold">Nikmati Petualangan Anda!</h5>
                                <p class="text-muted">
                                   Nikmati petualangan luar ruangan Anda! Buat kenangan yang tak terlupakan. 
                                   Jika ada masalah dengan peralatan, tim kami siap membantu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics -->
        <!-- Facts in Numbers -->
        <section class="py-5 bg-success text-white">
            <div class="container text-center" data-aos="fade-up">
                <h2 class="fw-bold mb-4 display-6">Facts in Numbers</h2>
                <p class="lead mb-5">Rekam jejak kami menunjukkan kualitas layanan dan kepuasan pelanggan kami.</p>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="bg-white text-dark p-4 rounded shadow">
                            <i class="fas fa-users fa-2x mb-2 text-success"></i>
                            <h3 class="fw-bold">540+</h3>
                            <p>Pelanggan Bahagia</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="bg-white text-dark p-4 rounded shadow">
                            <i class="fas fa-box fa-2x mb-2 text-success"></i>
                            <h3 class="fw-bold">200+</h3>
                            <p>Equipment Available</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="bg-white text-dark p-4 rounded shadow">
                            <i class="fas fa-calendar fa-2x mb-2 text-success"></i>
                            <h3 class="fw-bold">2+</h3>
                            <p>Years of Experience</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="bg-white text-dark p-4 rounded shadow">
                            <i class="fas fa-star fa-2x mb-2 text-success"></i>
                            <h3 class="fw-bold">24</h3>
                            <p>Hour Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

        <!-- FAQ -->
        <section id="faq" class="py-5 spacing-container">
            <div class="container">
                <h2 class="fw-bold mb-5 display-6">Frequently Asked Questions</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1">
                                Bagaimana cara memesan peralatan outdoor?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda dapat memesan melalui situs web kami dengan memilih peralatan yang Anda butuhkan,
                                 memeriksa ketersediaan, dan mengisi formulir pemesanan dengan tanggal sewa dan informasi kontak Anda.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2">
                                Apakah saya perlu membayar uang jaminan?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami memerlukan deposit keamanan yang akan dikembalikan setelah peralatan 
                                dikembalikan dalam kondisi baik.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3">
                                Bisakah saya menyewa peralatan untuk hari yang sama?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                               Sewa pada hari yang sama tergantung pada ketersediaan. 
                               Kami sarankan untuk memesan setidaknya 24 jam sebelumnya.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4">
                                Apakah peralatan dapat dikirim ke lokasi saya?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami menawarkan layanan pengiriman di area tertentu. 
                                Biaya pengiriman mungkin berlaku tergantung lokasi Anda.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq5">
                                Bagaimana jika peralatan rusak atau hilang selama masa sewa?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Pelanggan bertanggung jawab atas segala kerusakan atau kehilangan. 
                                Biaya perbaikan atau penggantian akan dipotong dari deposit Anda.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success">
                        Contact Us
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('resources/js/booking-script.js') }}"></script>
    <script src="{{ asset('resources/js/product-catalog.js') }}"></script>
    <script src="{{ asset('resources/js/navbar.js') }}"></script>
    <script src="{{ asset('resources/js/contact-wa.js') }}"></script>
@endpush
