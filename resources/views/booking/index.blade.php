@extends('layouts.app')

@section('contents')
<body>
  <!-- Booking Header -->
  <section class="booking-header py-4 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h2 class="mb-1">Booking Peralatan Outdoor</h2>
          <p class="text-muted mb-0">Lengkapi form di bawah untuk melakukan pemesanan</p>
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
                  <!-- Product 1 -->
                  <div class="col-md-6 mb-3" data-category="tenda">
                    <div class="product-item" data-id="1" data-name="Tenda Dome 4 Orang - Borneo" data-price="7" data-image="tent1.jpg">
                      <div class="product-content">
                        <img src="tent1.jpg" alt="Tenda Dome" class="product-img">
                        <div class="product-info">
                          <h6 class="product-name">Tenda Dome 4 Orang - Borneo</h6>
                          <div class="product-price">$7<span>/hari</span></div>
                          <div class="product-status">
                            <i class="fas fa-check-circle text-success"></i>
                            <span>Tersedia</span>
                          </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm add-item">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Product 2 -->
                  <div class="col-md-6 mb-3" data-category="backpack">
                    <div class="product-item" data-id="2" data-name="Carrier 60L - Osprey Atmos" data-price="12" data-image="backpack1.jpg">
                      <div class="product-content">
                        <img src="backpack1.jpg" alt="Carrier" class="product-img">
                        <div class="product-info">
                          <h6 class="product-name">Carrier 60L - Osprey Atmos</h6>
                          <div class="product-price">$12<span>/hari</span></div>
                          <div class="product-status">
                            <i class="fas fa-check-circle text-success"></i>
                            <span>Tersedia</span>
                          </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm add-item">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Product 3 -->
                  <div class="col-md-6 mb-3" data-category="sleeping">
                    <div class="product-item" data-id="3" data-name="Sleeping Bag -5°C - Speedo" data-price="4" data-image="sleeping-bag1.jpg">
                      <div class="product-content">
                        <img src="sleeping-bag1.jpg" alt="Sleeping Bag" class="product-img">
                        <div class="product-info">
                          <h6 class="product-name">Sleeping Bag -5°C - Speedo</h6>
                          <div class="product-price">$4<span>/hari</span></div>
                          <div class="product-status">
                            <i class="fas fa-check-circle text-success"></i>
                            <span>Tersedia</span>
                          </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm add-item">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Product 4 -->
                  <div class="col-md-6 mb-3" data-category="climbing">
                    <div class="product-item" data-id="4" data-name="Trekking Pole Carbon - Eiger" data-price="3" data-image="hiking-pole1.jpg">
                      <div class="product-content">
                        <img src="hiking-pole1.jpg" alt="Trekking Pole" class="product-img">
                        <div class="product-info">
                          <h6 class="product-name">Trekking Pole Carbon - Eiger</h6>
                          <div class="product-price">$3<span>/hari</span></div>
                          <div class="product-status">
                            <i class="fas fa-check-circle text-success"></i>
                            <span>Tersedia</span>
                          </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm add-item">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Product 5 -->
                  <div class="col-md-6 mb-3" data-category="cooking">
                    <div class="product-item" data-id="5" data-name="Kompor Portable Gas - MSR" data-price="5" data-image="stove1.jpg">
                      <div class="product-content">
                        <img src="stove1.jpg" alt="Kompor Portable" class="product-img">
                        <div class="product-info">
                          <h6 class="product-name">Kompor Portable Gas - MSR</h6>
                          <div class="product-price">$5<span>/hari</span></div>
                          <div class="product-status">
                            <i class="fas fa-check-circle text-success"></i>
                            <span>Tersedia</span>
                          </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm add-item">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Product 6 -->
                  <div class="col-md-6 mb-3" data-category="lighting">
                    <div class="product-item" data-id="6" data-name="Headlamp LED 400 Lumens" data-price="2" data-image="headlamp1.jpg">
                      <div class="product-content">
                        <img src="headlamp1.jpg" alt="Headlamp" class="product-img">
                        <div class="product-info">
                          <h6 class="product-name">Headlamp LED 400 Lumens</h6>
                          <div class="product-price">$2<span>/hari</span></div>
                          <div class="product-status">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span>Stok Terbatas</span>
                          </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm add-item">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
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
                    <input type="date" class="form-control" id="startDate" required>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-group">
                    <label class="form-label required">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="endDate" required>
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
                  <input type="text" class="form-control" id="fullName" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Email</label>
                  <input type="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">No. Telepon</label>
                  <input type="tel" class="form-control" id="phone" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">No. KTP</label>
                  <input type="text" class="form-control" id="idNumber" required>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label required">Alamat</label>
                  <textarea class="form-control" id="address" rows="3" required></textarea>
                </div>

                <!-- Pickup/Delivery Options -->
                <div class="col-12 mb-4">
                  <h5>Metode Pengambilan</h5>
                  <div class="pickup-options">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pickupMethod" id="pickup" value="pickup" checked>
                      <label class="form-check-label" for="pickup">
                        <strong>Ambil di Toko</strong>
                        <div class="text-muted small">Gratis - Ambil langsung di lokasi kami</div>
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pickupMethod" id="delivery" value="delivery">
                      <label class="form-check-label" for="delivery">
                        <strong>Antar ke Lokasi</strong>
                        <div class="text-muted small">+$10 - Kami antar ke alamat Anda</div>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Store Location (if pickup) -->
                <div class="col-12 mb-3" id="storeLocation">
                  <label class="form-label">Lokasi Toko</label>
                  <select class="form-select" id="storeSelect">
                    <option value="sentani">Camping Center Sentani - Jl. Raya Sentani No. 123</option>
                    <option value="jakarta">ExploreX Jakarta - Jl. Sudirman No. 456</option>
                    <option value="bandung">ExploreX Bandung - Jl. Dago No. 789</option>
                  </select>
                </div>

                <!-- Delivery Address (if delivery) -->
                <div class="col-12 mb-3 d-none" id="deliveryAddress">
                  <label class="form-label">Alamat Pengiriman</label>
                  <textarea class="form-control" id="deliveryAddressText" rows="3" placeholder="Masukkan alamat lengkap untuk pengiriman"></textarea>
                </div>

                <!-- Emergency Contact -->
                <div class="col-12 mb-4">
                  <h5>Kontak Darurat</h5>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">Nama Kontak Darurat</label>
                  <input type="text" class="form-control" id="emergencyName" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label required">No. Telepon Darurat</label>
                  <input type="tel" class="form-control" id="emergencyPhone" required>
                </div>

                <!-- Special Notes -->
                <div class="col-12 mb-3">
                  <label class="form-label">Catatan Khusus (Opsional)</label>
                  <textarea class="form-control" id="specialNotes" rows="3" placeholder="Masukkan catatan atau permintaan khusus"></textarea>
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
                <button type="submit" class="btn btn-success" id="submitBooking">
                  <i class="fas fa-paper-plane me-2"></i>Kirim Booking
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
                  <span id="deliveryFee">$0</span>
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

          <!-- Help Section -->
          <div class="help-section mt-4">
            <div class="help-header">
              <h6><i class="fas fa-question-circle me-2"></i>Butuh Bantuan?</h6>
            </div>
            <div class="help-content">
              <div class="help-item">
                <i class="fas fa-phone text-success"></i>
                <div>
                  <strong>Telepon</strong>
                  <div>+1-987-654-3210</div>
                </div>
              </div>
              <div class="help-item">
                <i class="fab fa-whatsapp text-success"></i>
                <div>
                  <strong>WhatsApp</strong>
                  <div>+1-987-654-3210</div>
                </div>
              </div>
              <div class="help-item">
                <i class="fas fa-envelope text-success"></i>
                <div>
                  <strong>Email</strong>
                  <div>hello@explorex.com</div>
                </div>
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
          <p class="text-muted mb-4">Booking Anda telah berhasil dikirim. Kami akan mengirimkan konfirmasi dan detail pembayaran melalui email.</p>
          <div class="booking-ref mb-4">
            <strong>Kode Booking: <span class="text-success" id="bookingCode">EXP-2024-001</span></strong>
          </div>
          <div class="d-flex gap-2 justify-content-center">
            <button type="button" class="btn btn-success" onclick="window.location.href='index.html'">
              Kembali ke Home
            </button>
            <button type="button" class="btn btn-outline-success" onclick="window.print()">
              Cetak Konfirmasi
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer py-5 text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-4">
          <img src="logo-white.png" alt="ExploreX" height="30" class="mb-3">
          <p>Explore adventures with proper preparation. We provide all the equipment you need for an enjoyable outdoor experience.</p>
          <div class="social-icons">
            <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 mb-4">
          <h5>Address</h5>
          <p>Camping Center, Sentani</p>
          <h5>Email</h5>
          <p>hello@explorex.com</p>
          <h5>Phone</h5>
          <p>+1-987-654-3210</p>
        </div>
        
        <div class="col-lg-3 mb-4">
          <h5>Useful links</h5>
          <ul class="list-unstyled">
            <li><a href="index.html" class="text-white text-decoration-none">Home</a></li>
            <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
            <li><a href="#" class="text-white text-decoration-none">Services</a></li>
            <li><a href="#" class="text-white text-decoration-none">How to Rent</a></li>
            <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 mb-4">
          <h5>Terms</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
            <li><a href="#" class="text-white text-decoration-none">Terms of Service</a></li>
            <li><a href="#" class="text-white text-decoration-none">Refund Policy</a></li>
            <li><a href="#" class="text-white text-decoration-none">Sitemap</a></li>
          </ul>
        </div>
      </div>
      
      <div class="border-top border-secondary pt-4 mt-4">
        <p class="text-center mb-0">© Copyright ExploreX 2023</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
@endsection

@push('styles')
    @vite(['resources/css/booking-style.css'])
@endpush
@push('scripts')
    <script src="{{ asset('resources/js/booking-script.js') }}"></script>
    <script src="{{ asset('resources/js/navbar.js') }}"></script>
    <script src="{{ asset('resources/js/contact-wa.js') }}"></script>
@endpush
