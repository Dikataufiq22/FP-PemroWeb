@extends('layouts.app')
@vite('resources/js/app.js')
@section('contents')
<body>
  <!-- Booking Header -->
  <section class="booking-header py-4 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h2 class="display-6 fw-bold mb-1">Booking Peralatan Outdoor</h2>
          <p class="text-muted mb-0">Silakan isi formulir berikut dengan lengkap dan benar untuk melanjutkan proses pemesanan Anda. 
          Informasi yang Anda berikan akan membantu kami memproses pesanan Anda dengan cepat dan akurat.</p>
        </div>
        <div class="col-md-4">
          <div class="booking-steps">
            <div class="step active" data-step="1">
              <span class="step-number">1</span>
              <span class="step-text">Pilih Item</span>
            </div>
            <div class="step" data-step="2">
              <span class="step-number">2</span>
              <span class="step-text">Detail</span>
            </div>
            <div class="step" data-step="3">
              <span class="step-number">3</span>
              <span class="step-text">Konfirmasi</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Booking Form -->
  <section class="booking-section py-5">
    <div class="container">
      <div class="row">
        <!-- Booking Form -->
        <div class="col-lg-8">
          <form id="bookingForm" class="booking-form">
            @csrf
            <!-- Step 1: Pilih Item -->
            <div class="form-step active" id="step1">
              <div class="step-header">
                <h4><i class="fas fa-shopping-cart me-2"></i>Pilih Peralatan</h4>
                <p class="text-muted">Pilih peralatan yang ingin Anda sewa</p>
              </div>

              <!-- Search Products -->
              <div class="search-section mb-4">
                <div class="row">
                  <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control" id="productSearch" placeholder="Cari peralatan...">
                      <button class="btn btn-outline-success" type="button">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <select class="form-select" id="categoryFilter">
                      <option value="">Semua Kategori</option>
                      <option value="tenda">Tenda & Shelter</option>
                      <option value="sleeping">Sleeping Gear</option>
                      <option value="backpack">Tas & Carrier</option>
                      <option value="cooking">Peralatan Masak</option>
                      <option value="climbing">Peralatan Mendaki</option>
                      <option value="lighting">Penerangan</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Selected Items -->
              <div class="selected-items mb-4">
                <h6>Item Terpilih <span class="badge bg-success" id="selectedCount">0</span></h6>
                <div id="selectedItemsList" class="selected-list">
                  <div class="empty-state text-center py-4">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada item yang dipilih</p>
                  </div>
                </div>
              </div>

              <!-- Available Products -->
              <div class="available-products">
  <h6>Peralatan Tersedia</h6>
  <div class="row" id="productList">
    @foreach ($products as $product)
      <div class="col-md-6 mb-3" data-category="{{ $product->category ?? '' }}">
        <div class="product-item"
             data-id="{{ $product->id }}"
             data-name="{{ $product->name }}"
             data-price="{{ $product->price }}"
             data-image="{{ asset('storage/' . $product->image) }}">
          <div class="product-content border rounded p-2 d-flex align-items-center">
            <img src="{{ asset('storage/' . $product->image) }}"alt="{{ $product->name }}" class="product-img rounded me-3" style="width:80px; height:80px; object-fit:cover;">
            <div class="product-info flex-grow-1">
              <h6 class="product-name mb-1">{{ $product->name }}</h6>
              <div class="product-price text-success fw-bold">
                Rp {{ number_format($product->price) }}<span class="text-muted">/hari</span>
              </div>
              <div class="product-status small text-muted">
                <i class="fas fa-check-circle text-success me-1"></i>
                <span>Tersedia</span>
              </div>
            </div>
            <button type="button" class="btn btn-outline-success btn-sm add-item ms-2">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


                  

              <div class="step-navigation">
                <button type="button" class="btn btn-success" id="nextStep1" disabled>
                  Lanjut ke Detail <i class="fas fa-arrow-right ms-2"></i>
                </button>
              </div>
            </div>

            <!-- Step 2: Detail Booking -->
            <div class="form-step" id="step2">
              <div class="step-header">
                <h4><i class="fas fa-calendar-alt me-2"></i>Detail Booking</h4>
                <p class="text-muted">Tentukan tanggal dan informasi detail booking</p>
              </div>

              <div class="row">
                <!-- Rental Dates -->
                <div class="col-md-6 mb-4">
                  <div class="form-group">
                    <label class="form-label required">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" required>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-group">
                    <label class="form-label required">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="endDate" name="end_date" required>
                  </div>
                </div>

                <!-- Duration Display -->
                <div class="col-12 mb-4">
                  <div class="rental-duration">
                    <div class="duration-info">
                      <i class="fas fa-clock me-2"></i>
                      <span>Durasi Sewa: <strong id="rentalDuration">0 hari</strong></span>
                    </div>
                  </div>
                </div>

                <!-- Customer Information -->
                <div class="col-12 mb-4">
                  <h5>Informasi Penyewa</h5>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Nama Lengkap</label>
                  <input type="text" class="form-control" id="fullName" name="full_name" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">No. Telepon</label>
                  <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">No. KTP</label>
                  <input type="text" class="form-control" id="idNumber" name="id_number" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label required">Alamat</label>
                  <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
                </div>

                <!-- Pickup/Delivery Options -->
                <div class="col-12 mb-4">
                  <h5>Metode Pengambilan</h5>
                  <div class="pickup-options">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pickup_method" id="pickup" value="pickup" checked>
                      <label class="form-check-label" for="pickup">
                        <strong>Ambil di Toko</strong>
                        <div class="text-muted small">Gratis - Ambil langsung di lokasi kami</div>
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pickup_method" id="delivery" value="delivery">
                      <label class="form-check-label" for="delivery">
                        <strong>Antar ke Lokasi</strong>
                        <div class="text-muted small">+Rp10.000 - Kami antar ke alamat Anda</div>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Store Location (if pickup) -->
                <div class="col-12 mb-3" id="storeLocation">
                  <label class="form-label">Lokasi Toko</label>
                  <select class="form-select" id="storeSelect" name="store_select">
                    <option value="sentani">Camping Center Sentani - Jl. Raya Sentani No. 123</option>
                    <option value="jakarta">ExploreX Jakarta - Jl. Sudirman No. 456</option>
                    <option value="bandung">ExploreX Bandung - Jl. Dago No. 789</option>
                  </select>
                </div>

                <!-- Delivery Address (if delivery) -->
                <div class="col-12 mb-3 d-none" id="deliveryAddress">
                  <label class="form-label">Alamat Pengiriman</label>
                  <textarea class="form-control" name="delivery_address" id="deliveryAddressText" rows="3" placeholder="Masukkan alamat lengkap untuk pengiriman"></textarea>
                </div>

                <!-- Emergency Contact -->
                <div class="col-12 mb-4">
                  <h5>Kontak Darurat</h5>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Nama Kontak Darurat</label>
                  <input type="text" class="form-control" id="emergencyName" name="emergency_name"required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">No. Telepon Darurat</label>
                  <input type="tel" class="form-control" id="emergencyPhone" name="emergency_phone" required>
                </div>

                <!-- Special Notes -->
                <div class="col-12 mb-3">
                  <label class="form-label">Catatan Khusus (Opsional)</label>
                  <textarea class="form-control" id="specialNotes" name="special_notes" rows="3" placeholder="Masukkan catatan atau permintaan khusus"></textarea>
                </div>
              </div>

              <div class="step-navigation">
                <button type="button" class="btn btn-outline-secondary" id="prevStep2">
                  <i class="fas fa-arrow-left me-2"></i>Kembali
                </button>
                <button type="button" class="btn btn-success" id="nextStep2">
                  Lanjut ke Konfirmasi <i class="fas fa-arrow-right ms-2"></i>
                </button>
              </div>
            </div>

            <!-- Step 3: Konfirmasi -->
            <div class="form-step" id="step3">
              <div class="step-header">
                <h4><i class="fas fa-check-circle me-2"></i>Konfirmasi Booking</h4>
                <p class="text-muted">Periksa kembali detail booking Anda</p>
              </div>

              <!-- Booking Summary -->
              <div class="booking-summary">
                <div class="summary-section">
                  <h5>Item yang Disewa</h5>
                  <div id="confirmationItemsList"></div>
                </div>

                <div class="summary-section">
                  <h5>Detail Rental</h5>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="detail-item">
                        <label>Tanggal Mulai:</label>
                        <span id="confirmStartDate">-</span>
                      </div>
                      <div class="detail-item">
                        <label>Tanggal Selesai:</label>
                        <span id="confirmEndDate">-</span>
                      </div>
                      <div class="detail-item">
                        <label>Durasi:</label>
                        <span id="confirmDuration">-</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="detail-item">
                        <label>Metode Pengambilan:</label>
                        <span id="confirmPickupMethod">-</span>
                      </div>
                      <div class="detail-item">
                        <label>Lokasi:</label>
                        <span id="confirmLocation">-</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="summary-section">
                  <h5>Informasi Penyewa</h5>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="detail-item">
                        <label>Nama:</label>
                        <span id="confirmName">-</span>
                      </div>
                      <div class="detail-item">
                        <label>Email:</label>
                        <span id="confirmEmail">-</span>
                      </div>
                      <div class="detail-item">
                        <label>Telepon:</label>
                        <span id="confirmPhone">-</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="detail-item">
                        <label>No. KTP:</label>
                        <span id="confirmIdNumber">-</span>
                      </div>
                      <div class="detail-item">
                        <label>Kontak Darurat:</label>
                        <span id="confirmEmergency">-</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="terms-section">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                    <label class="form-check-label" for="agreeTerms">
                      Saya menyetujui <a href="#" class="text-success">syarat dan ketentuan</a> serta <a href="#" class="text-success">kebijakan privasi</a>
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="agreeDeposit" required>
                    <label class="form-check-label" for="agreeDeposit">
                      Saya memahami bahwa deposit keamanan sebesar <strong>50% dari total biaya</strong> akan dikenakan dan akan dikembalikan setelah pengembalian peralatan dalam kondisi baik
                    </label>
                  </div>
                </div>
              </div>

              <div class="step-navigation">
                <button type="button" class="btn btn-outline-secondary" id="prevStep3">
                  <i class="fas fa-arrow-left me-2"></i>Kembali
                </button>
                <button type="submit" class="btn btn-success" id="submitBooking" data-bs-toggle="modal" data-bs-target="#successModal">
                  <i class="fas fa-paper-plane me-2"></i>Booking
                </button>
              </div>
            </div>
          </form>
        </div>

        <!-- Booking Summary Sidebar -->
        <div class="col-lg-4">
          <div class="booking-sidebar">
            <div class="sidebar-header">
              <h5><i class="fas fa-receipt me-2"></i>Ringkasan Booking</h5>
            </div>

            <div class="sidebar-content">
              <!-- Selected Items Summary -->
              <div class="summary-items" id="sidebarItems">
                <div class="empty-summary text-center py-4">
                  <i class="fas fa-shopping-cart fa-2x text-muted mb-2"></i>
                  <p class="text-muted mb-0">Belum ada item dipilih</p>
                </div>
              </div>

              <!-- Price Breakdown -->
              <div class="price-breakdown">
                <div class="price-item">
                  <span>Subtotal Item:</span>
                  <span id="subtotalPrice">$0</span>
                </div>
                <div class="price-item">
                  <span>Biaya Antar:</span>
                  <span id="deliveryFee">+Rp10.000</span>
                </div>
                <div class="price-item">
                  <span>Durasi:</span>
                  <span id="sidebarDuration">0 hari</span>
                </div>
                <hr>
                <div class="price-item total">
                  <span>Total:</span>
                  <span id="totalPrice">$0</span>
                </div>
                <div class="price-item deposit">
                  <span>Deposit (50%):</span>
                  <span id="depositAmount">$0</span>
                </div>
              </div>

              <!-- Quick Actions -->
              <div class="quick-actions mt-3">
                <button type="button" class="btn btn-outline-success w-100 mb-2" id="saveBooking">
                  <i class="fas fa-save me-2"></i>Simpan Draft
                </button>
                <button type="button" class="btn btn-outline-secondary w-100" id="clearBooking">
                  <i class="fas fa-trash me-2"></i>Reset Form
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center py-5">
          <div class="success-icon mb-4">
            <i class="fas fa-check-circle fa-4x text-success"></i>
          </div>
          <h4 class="mb-3">Booking Berhasil!</h4>
          <p class="text-muted mb-4">Anda telah berhasil Booking</p>
          <div class="d-flex gap-2 justify-content-center">
            <button type="button" class="btn btn-success" onclick="window.location.href='{{ url('catalog') }}'">
              Kembali ke Home
            </button>
            <button type="button" class="btn btn-outline-success" onclick="window.location.href='{{ url('profile/booking-history') }}'">
              Riwayat Booking
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

 
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

@push('styles')
    @vite(['resources/css/booking-style.css'])
@endpush

