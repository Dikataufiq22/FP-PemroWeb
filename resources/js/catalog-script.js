// Filter functionality
document.addEventListener("DOMContentLoaded", () => {
  // Filter checkboxes
  const filterCheckboxes = document.querySelectorAll(".form-check-input")
  const productCards = document.querySelectorAll(".product-card")

  // Sort functionality
  const sortSelect = document.querySelector("select")

  // View toggle buttons
  const gridViewBtn = document.querySelector(".btn-outline-secondary.active")
  const listViewBtn = document.querySelector(".btn-outline-secondary:not(.active)")

  // Filter products based on selected filters
  function filterProducts() {
    const selectedCategories = []
    const selectedPrices = []
    const selectedBrands = []
    const selectedAvailability = []

    filterCheckboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        const label = checkbox.nextElementSibling.textContent.trim()
        const filterId = checkbox.id

        if (filterId.includes("price")) {
          selectedPrices.push(filterId)
        } else if (["osprey", "northface", "eiger", "rei", "patagonia"].includes(filterId)) {
          selectedBrands.push(filterId)
        } else if (["available", "upcoming"].includes(filterId)) {
          selectedAvailability.push(filterId)
        } else {
          selectedCategories.push(filterId)
        }
      }
    })

    // Show/hide products based on filters
    productCards.forEach((card) => {
      let shouldShow = true

      // Apply category filter
      if (selectedCategories.length > 0) {
        const category = card.querySelector(".product-category").textContent.trim()
        const categoryMatch = selectedCategories.some((cat) => {
          switch (cat) {
            case "tents":
              return category.includes("Tenda")
            case "sleeping":
              return category.includes("Sleeping")
            case "backpacks":
              return category.includes("Tas")
            case "cooking":
              return category.includes("Masak")
            case "climbing":
              return category.includes("Mendaki")
            case "lighting":
              return category.includes("Penerangan")
            default:
              return false
          }
        })
        if (!categoryMatch) shouldShow = false
      }

      // Apply availability filter
      if (selectedAvailability.length > 0) {
        const availability = card.querySelector(".product-availability span").textContent.trim()
        const availabilityMatch = selectedAvailability.some((avail) => {
          switch (avail) {
            case "available":
              return availability === "Tersedia"
            case "upcoming":
              return availability === "Tersedia Minggu Depan"
            default:
              return false
          }
        })
        if (!availabilityMatch) shouldShow = false
      }

      card.closest(".col-md-4").style.display = shouldShow ? "block" : "none"
    })

    updateProductCount()
  }

  // Update product count
  function updateProductCount() {
    const visibleProducts = document.querySelectorAll('.col-md-4:not([style*="display: none"])').length
    const countElement = document.querySelector(".text-muted")
    countElement.textContent = `Menampilkan 1-${visibleProducts} dari ${visibleProducts} produk`
  }

  // Sort products
  function sortProducts(criteria) {
    const productContainer = document.querySelector(".row")
    const products = Array.from(productContainer.querySelectorAll(".col-md-4"))

    products.sort((a, b) => {
      const priceA = Number.parseInt(a.querySelector(".price").textContent.replace("$", ""))
      const priceB = Number.parseInt(b.querySelector(".price").textContent.replace("$", ""))
      const titleA = a.querySelector(".product-title").textContent
      const titleB = b.querySelector(".product-title").textContent

      switch (criteria) {
        case "Harga Terendah":
          return priceA - priceB
        case "Harga Tertinggi":
          return priceB - priceA
        case "Nama A-Z":
          return titleA.localeCompare(titleB)
        default:
          return 0
      }
    })

    products.forEach((product) => productContainer.appendChild(product))
  }

  // Reset filters
  function resetFilters() {
    filterCheckboxes.forEach((checkbox) => {
      if (checkbox.id !== "available") {
        checkbox.checked = false
      }
    })
    filterProducts()
  }

  // Event listeners
  filterCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", filterProducts)
  })

  sortSelect.addEventListener("change", function () {
    sortProducts(this.value)
  })

  document.querySelector(".btn-outline-secondary.w-100").addEventListener("click", resetFilters)

  // View toggle functionality
  gridViewBtn.addEventListener("click", function () {
    this.classList.add("active")
    listViewBtn.classList.remove("active")
    // Switch to grid view
    productCards.forEach((card) => {
      card.closest(".col-md-4").className = "col-md-4 mb-4"
    })
  })

  listViewBtn.addEventListener("click", function () {
    this.classList.add("active")
    gridViewBtn.classList.remove("active")
    // Switch to list view
    productCards.forEach((card) => {
      card.closest(".col-md-4").className = "col-12 mb-4"
    })
  })

  // Search functionality
  const searchInput = document.querySelector('input[placeholder="Cari peralatan..."]')
  const searchBtn = document.querySelector(".btn-success")

  function searchProducts() {
    const searchTerm = searchInput.value.toLowerCase()

    productCards.forEach((card) => {
      const title = card.querySelector(".product-title").textContent.toLowerCase()
      const category = card.querySelector(".product-category").textContent.toLowerCase()

      if (title.includes(searchTerm) || category.includes(searchTerm)) {
        card.closest(".col-md-4").style.display = "block"
      } else {
        card.closest(".col-md-4").style.display = "none"
      }
    })

    updateProductCount()
  }

  searchBtn.addEventListener("click", searchProducts)
  searchInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      searchProducts()
    }
  })

  // Wishlist functionality
  document.querySelectorAll(".fa-heart").forEach((heart) => {
    heart.addEventListener("click", function () {
      this.classList.toggle("fas")
      this.classList.toggle("far")
      this.style.color = this.classList.contains("fas") ? "#dc3545" : ""
    })
  })
})
