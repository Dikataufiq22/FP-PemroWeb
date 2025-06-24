@extends('layouts.app')

@section('contents')
    <div>
        <!-- Hero Section -->
        <section id="home" class="hero-section relative" style="background-image:url({{ url('assets/bg.jpg') }})">
            <div class="hero-overlay spacing-container">
                <div class="container relative">
                    <div class="row align-items-center min-vh-100 pt-5">
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-bold text-white mb-4">
                                Solusi Praktis untuk kebutuhan Outdoor-mu.
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
        <section class="py-5 bg-light spacing-container relative" style="z-index: 2;">
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
                        <img src="{{ asset('assets/bg2.jpg') }}" alt="About Us" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-4">About Us</h2>
                        <p class="mb-3">
                            <strong>ExploreX</strong> is a trusted outdoor equipment rental service provider
                            dedicated to supporting your adventures in the wild. We provide a
                            comprehensive range of high-quality outdoor gear including tents,
                            mattresses, carriers, portable stoves, and other camping
                            equipment to meet your outdoor activity needs, from mountain
                            climbing to beach camping, jungle trekking, and much more.
                        </p>
                        <p class="mb-3">
                            Founded by nature lovers, we understand how important safe,
                            comfortable, and reliable practical equipment is when exploring nature.
                            Therefore, all of our equipment is routinely maintained and ready
                            to use, ensuring the best experience for our customers.
                        </p>
                        <p class="mb-4">
                            We are committed to being your most trusted outdoor equipment rental
                            partner. With an easy rental system, affordable prices, and friendly
                            service, we want to be a part of every step of your adventure.
                        </p>
                        <p class="text-success fw-bold">
                            Discover the freedom to explore without having to buy. Just rent
                            at ExploreX!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Catalog -->
        <section id="catalog" class="py-5 bg-light ">
            <div class="container spacing-container">
                <div class="row mb-5">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-3">Choose the item that suits you</h2>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="/catalog" class="text-success text-decoration-none">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/' . $product->image)  }}" alt={{$product->name}} class="img-fluid mb-3">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <span class="text-success fw-bold fs-4">Rp{{$product->price}}</span>
                                    <span class="text-muted ms-2">/day</span>
                                </div>
                                <div class="d-flex justify-content-center gap-2 mb-3">
                                    <span class="badge bg-light text-dark">{{$product->brand}}</span>
                                    <span class="badge bg-light text-dark">{{$product->status}}</span>
                                </div>
                                <button class="btn btn-success w-100" onclick="viewProduct('borneo-tent')">View
                                    Details</button>
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
                <h2 class="text-center fw-bold mb-5">How to Rent</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                1
                            </div>
                            <div>
                                <h5 class="fw-bold">Select the required items</h5>
                                <p class="text-muted">
                                    Browse our catalog and select the outdoor equipment you need, such as Tents &
                                    Mattresses, Sleeping Bags,
                                    Carriers & Backpacks, Bags, Portable Cooking Equipment, and other equipment according to
                                    your adventure needs.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                2
                            </div>
                            <div>
                                <h5 class="fw-bold">Check Availability</h5>
                                <p class="text-muted">
                                    Check the availability of equipment on your desired rental date. We will show you
                                    real-time availability and help you choose the perfect gear for your trip.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                3
                            </div>
                            <div>
                                <h5 class="fw-bold">Make a Booking</h5>
                                <p class="text-muted">
                                    Fill in the booking form, then fill in the booking details.
                                    Choose payment method & secure your rental. Receive a confirmation email.
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
                                <h5 class="fw-bold">Confirmation</h5>
                                <p class="text-muted">
                                    After filling out the form, you will receive confirmation via email.
                                    We will also call you 1 day before for pickup or delivery.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                5
                            </div>
                            <div>
                                <h5 class="fw-bold">Pick up the Item</h5>
                                <p class="text-muted">
                                    Come to our location on the agreed date or wait for the
                                    delivery if you choose the delivery option. Our team will provide
                                    a brief explanation of how to use the equipment.
                                </p>
                            </div>
                        </div>
                        <div class="process-step d-flex mb-4">
                            <div
                                class="step-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                6
                            </div>
                            <div>
                                <h5 class="fw-bold">Enjoy Your Adventure!</h5>
                                <p class="text-muted">
                                    Enjoy your outdoor adventure! Create unforgettable memories. If there are any
                                    problems with the equipment, our team is ready to help.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics -->
        <section class="py-5 bg-success text-white">
            <div class="container spacing-container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Facts in Numbers</h2>
                    <p class="#">We believe that our track record speaks for itself, and we are committed to providing
                        reliable, quality, and user-friendly outdoor equipment rental services.</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card bg-white text-dark h-100 border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-2x mb-3"></i>
                                <h3 class="fw-bold">540+</h3>
                                <p class="mb-0">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card bg-white text-dark h-100 border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-box fa-2x mb-3"></i>
                                <h3 class="fw-bold">200+</h3>
                                <p class="mb-0">Equipment Available</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card bg-white text-dark h-100 border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar fa-2x mb-3"></i>
                                <h3 class="fw-bold">2+</h3>
                                <p class="mb-0">Years of Experience</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card bg-white text-dark h-100 border-0">
                            <div class="card-body text-center">
                                <i class="fas fa-star fa-2x mb-3"></i>
                                <h3 class="fw-bold">24</h3>
                                <p class="mb-0">Hour Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="py-5 spacing-container">
            <div class="container">
                <h2 class="fw-bold mb-5">Frequently Asked Questions</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1">
                                How to order outdoor equipment?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can order through our website by selecting the equipment you need, checking
                                availability,
                                and completing the booking form with your rental dates and contact information.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2">
                                Do I need to pay a deposit?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we require a security deposit that will be refunded upon return of the equipment in
                                good condition.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3">
                                Can I rent equipment for the same day?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Same-day rentals are subject to availability. We recommend booking at least 24 hours in
                                advance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4">
                                Can the equipment be delivered to my location?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we offer delivery services within certain areas. Delivery fees may apply depending on
                                your location.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq5">
                                What if the equipment is damaged or lost during rental?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Customers are responsible for any damage or loss. Repair or replacement costs will be
                                deducted from your deposit.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-success" onclick="sendToWA()">Contact Us</button>
                </div>
            </div>
        </section>




    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
    <script src="{{ asset('resources/js/booking-script.js') }}"></script>
    <script src="{{ asset('resources/js/product-catalog.js') }}"></script>
    <script src="{{ asset('resources/js/navbar.js') }}"></script>
    <script src="{{ asset('resources/js/contact-wa.js') }}"></script>
@endpush
