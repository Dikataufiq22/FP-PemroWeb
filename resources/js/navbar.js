// JavaScript untuk navbar active state
document.addEventListener('DOMContentLoaded', function() {
    // Ambil semua nav-link
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    // Tambahkan event listener untuk setiap nav-link
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Hapus class active dari semua nav-link
            navLinks.forEach(navLink => {
                navLink.classList.remove('active');
                navLink.style.color = '';
                navLink.style.fontWeight = '';
            });
            
            // Tambahkan class active ke nav-link yang diklik
            this.classList.add('active');
            this.style.color = '#2e8b57'; // Warna hijau
            this.style.fontWeight = 'bold'; // Tebal
        });
    });
    
    // Set default active untuk Home saat halaman dimuat
    const homeLink = document.querySelector('.navbar-nav .nav-link[href="#home"]');
    if (homeLink) {
        homeLink.style.color = '#2e8b57';
        homeLink.style.fontWeight = 'bold';
    }
});

// Fungsi untuk catalog (jika diperlukan)
function showCatalogPage() {
    // Set active state untuk catalog
    const catalogLink = document.querySelector('.navbar-nav .nav-link[onclick="showCatalogPage()"]');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    // Reset semua nav-link
    navLinks.forEach(navLink => {
        navLink.classList.remove('active');
        navLink.style.color = '';
        navLink.style.fontWeight = '';
    });
    
    // Set active untuk catalog
    if (catalogLink) {
        catalogLink.classList.add('active');
        catalogLink.style.color = '#2e8b57';
        catalogLink.style.fontWeight = 'bold';
    }
    
    // Tambahkan logika untuk menampilkan halaman catalog di sini
    console.log('Catalog page clicked');
}