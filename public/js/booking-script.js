// Booking System JavaScript
document.addEventListener("DOMContentLoaded", () => {
    let selectedItems = []
    let currentStep = 1
    let rentalDays = 0
  
    // DOM elements
    const steps = document.querySelectorAll(".form-step")
    const stepIndicators = document.querySelectorAll(".step")
    const productItems = document.querySelectorAll(".product-item")
    const selectedItemsList = document.getElementById("selectedItemsList")
    const selectedCount = document.getElementById("selectedCount")
    const nextStep1 = document.getElementById("nextStep1")
    const nextStep2 = document.getElementById("nextStep2")
    const prevStep2 = document.getElementById("prevStep2")
    const prevStep3 = document.getElementById("prevStep3")
    const submitBooking = document.getElementById("submitBooking")
    const startDate = document.getElementById("startDate")
    const endDate = document.getElementById("endDate")
    const pickupRadios = document.querySelectorAll('input[name="pickupMethod"]')
    const deliveryAddressDiv = document.getElementById("deliveryAddress")
    const storeLocationDiv = document.getElementById("storeLocation")
  
    // Initialize
    init()
  
    function init() {
      setupEventListeners()
      updateStepIndicators()
      setMinDate()
      updateSidebar()
    }
  
    function setupEventListeners() {
      // Product selection
      productItems.forEach((item) => {
        const addBtn = item.querySelector(".add-item")
        addBtn.addEventListener("click", () => addItem(item))
      })
  
      // Navigation buttons
      nextStep1.addEventListener("click", () => goToStep(2))
      nextStep2.addEventListener("click", () => validateStep2() && goToStep(3))
      prevStep2.addEventListener("click", () => goToStep(1))
      prevStep3.addEventListener("click", () => goToStep(2))
  
      // Form submission
      submitBooking.addEventListener("click", handleSubmit)
  
      // Date changes
      startDate.addEventListener("change", calculateDuration)
      endDate.addEventListener("change", calculateDuration)
  
      // Pickup method changes
      pickupRadios.forEach((radio) => {
        radio.addEventListener("change", handlePickupMethodChange)
      })
  
      // Search and filter
      document.getElementById("productSearch").addEventListener("input", filterProducts)
      document.getElementById("categoryFilter").addEventListener("change", filterProducts)
  
      // Quick actions
      document.getElementById("saveBooking").addEventListener("click", saveBookingDraft)
      document.getElementById("clearBooking").addEventListener("click", clearBooking)
    }
  
    function setMinDate() {
      const today = new Date().toISOString().split("T")[0]
      startDate.min = today
      endDate.min = today
    }
  
    function addItem(productElement) {
      const id = productElement.dataset.id
      const name = productElement.dataset.name
      const price = Number.parseInt(productElement.dataset.price)
      const image = productElement.dataset.image
  
      // Check if item already exists
      const existingItem = selectedItems.find((item) => item.id === id)
      if (existingItem) {
        existingItem.quantity++
      } else {
        selectedItems.push({
          id,
          name,
          price,
          image,
          quantity: 1,
        })
      }
  
      updateSelectedItems()
      updateSidebar()
      enableNextStep1()
    }
  
    function removeItem(id) {
      selectedItems = selectedItems.filter((item) => item.id !== id)
      updateSelectedItems()
      updateSidebar()
      enableNextStep1()
    }
  
    function updateItemQuantity(id, quantity) {
      const item = selectedItems.find((item) => item.id === id)
      if (item) {
        item.quantity = Math.max(1, quantity)
        updateSelectedItems()
        updateSidebar()
      }
    }
  
    function updateSelectedItems() {
      selectedCount.textContent = selectedItems.length
  
      if (selectedItems.length === 0) {
        selectedItemsList.innerHTML = 
                  <div class="empty-state text-center py-4">
                      <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                      <p class="text-muted">Belum ada item yang dipilih</p>
                  </div>
              
      } else {
        selectedItemsList.innerHTML = selectedItems
          .map(
            (item) => `
                  <div class="selected-item">
                      <div class="selected-item-info">
                          <img src="${item.image}" alt="${item.name}" class="selected-item-img">
                          <div class="selected-item-details">
                              <h6>${item.name}</h6>
                              <div class="selected-item-price">$${item.price}/hari</div>
                          </div>
                      </div>
                      <div class="quantity-controls">
                          <button type="button" class="quantity-btn" onclick="updateItemQuantity('${item.id}', ${item.quantity - 1})">
                              <i class="fas fa-minus"></i>
                          </button>
                          <input type="number" class="quantity-input" value="${item.quantity}" min="1" 
                                 onchange="updateItemQuantity('${item.id}', this.value)">
                          <button type="button" class="quantity-btn" onclick="updateItemQuantity('${item.id}', ${item.quantity + 1})">
                              <i class="fas fa-plus"></i>
                          </button>
                          <button type="button" class="btn btn-outline-danger btn-sm ms-2" onclick="removeItem('${item.id}')">
                              <i class="fas fa-trash"></i>
                          </button>
                      </div>
                  </div>
              `,
          )
          .join("")
      }
    }
  
    function enableNextStep1() {
      nextStep1.disabled = selectedItems.length === 0
    }
  
    function calculateDuration() {
      const start = new Date(startDate.value)
      const end = new Date(endDate.value)
  
      if (start && end && end > start) {
        rentalDays = Math.ceil((end - start) / (1000 * 60 * 60 * 24))
        document.getElementById("rentalDuration").textContent = `${rentalDays} hari`
        document.getElementById("sidebarDuration").textContent = `${rentalDays} hari`
        updateSidebar()
      } else {
        rentalDays = 0
        document.getElementById("rentalDuration").textContent = "0 hari"
        document.getElementById("sidebarDuration").textContent = "0 hari"
      }
    }
  
    function handlePickupMethodChange() {
      const isDelivery = document.getElementById("delivery").checked
  
      if (isDelivery) {
        deliveryAddressDiv.classList.remove("d-none")
        storeLocationDiv.classList.add("d-none")
      } else {
        deliveryAddressDiv.classList.add("d-none")
        storeLocationDiv.classList.remove("d-none")
      }
  
      updateSidebar()
    }
  
    function updateSidebar() {
      const sidebarItems = document.getElementById("sidebarItems")
      const subtotalPrice = document.getElementById("subtotalPrice")
      const deliveryFee = document.getElementById("deliveryFee")
      const totalPrice = document.getElementById("totalPrice")
      const depositAmount = document.getElementById("depositAmount")
  
      if (selectedItems.length === 0) {
        sidebarItems.innerHTML = `
                  <div class="empty-summary text-center py-4">
                      <i class="fas fa-shopping-cart fa-2x text-muted mb-2"></i>
                      <p class="text-muted mb-0">Belum ada item dipilih</p>
                  </div>
              `
      } else {
        sidebarItems.innerHTML = selectedItems
          .map(
            (item) => `
                  <div class="sidebar-item">
                      <img src="${item.image}" alt="${item.name}" class="sidebar-item-img">
                      <div class="sidebar-item-info">
                          <div class="sidebar-item-name">${item.name}</div>
                          <div class="sidebar-item-price">$${item.price}/hari</div>
                          <div class="sidebar-item-qty">Qty: ${item.quantity}</div>
                      </div>
                  </div>
              `,
          )
          .join("")
      }
  
      // Calculate prices
      const subtotal = selectedItems.reduce((sum, item) => sum + item.price * item.quantity, 0)
      const delivery = document.getElementById("delivery")?.checked ? 10 : 0
      const total = subtotal * Math.max(rentalDays, 1) + delivery
      const deposit = Math.round(total * 0.5)
  
      subtotalPrice.textContent = `$${subtotal}`
      deliveryFee.textContent = `$${delivery}`
      totalPrice.textContent = `$${total}`
      depositAmount.textContent = `$${deposit}`
    }
  
    function validateStep2() {
      const requiredFields = [
        "startDate",
        "endDate",
        "fullName",
        "email",
        "phone",
        "idNumber",
        "address",
        "emergencyName",
        "emergencyPhone",
      ]
  
      let isValid = true
      requiredFields.forEach((fieldId) => {
        const field = document.getElementById(fieldId)
        if (!field.value.trim()) {
          field.classList.add("is-invalid")
          isValid = false
        } else {
          field.classList.remove("is-invalid")
        }
      })
  
      if (rentalDays === 0) {
        startDate.classList.add("is-invalid")
        endDate.classList.add("is-invalid")
        isValid = false
      }
  
      return isValid
    }
  
    function goToStep(step) {
      if (step === 3) {
        updateConfirmationPage()
      }
  
      // Hide all steps
      steps.forEach((s) => s.classList.remove("active"))
      stepIndicators.forEach((s) => s.classList.remove("active"))
  
      // Show current step
      document.getElementById(`step${step}`).classList.add("active")
      stepIndicators[step - 1].classList.add("active")
  
      currentStep = step
      updateStepIndicators()
    }
  
    function updateStepIndicators() {
      stepIndicators.forEach((indicator, index) => {
        if (index < currentStep) {
          indicator.classList.add("active")
        } else {
          indicator.classList.remove("active")
        }
      })
    }
  
    function updateConfirmationPage() {
      // Update items list
      const confirmationItemsList = document.getElementById("confirmationItemsList")
      confirmationItemsList.innerHTML = selectedItems
        .map(
          (item) => `
              <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                  <div class="d-flex align-items-center">
                      <img src="${item.image}" alt="${item.name}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; margin-right: 10px;">
                      <div>
                          <div class="fw-semibold">${item.name}</div>
                          <small class="text-muted">Qty: ${item.quantity}</small>
                      </div>
                  </div>
                  <div class="text-success fw-bold">$${item.price * item.quantity}/hari</div>
              </div>
          `,
        )
        .join("")
  
      // Update details
      document.getElementById("confirmStartDate").textContent = startDate.value
      document.getElementById("confirmEndDate").textContent = endDate.value
      document.getElementById("confirmDuration").textContent = `${rentalDays} hari`
  
      const pickupMethod = document.querySelector('input[name="pickupMethod"]:checked').value
      document.getElementById("confirmPickupMethod").textContent =
        pickupMethod === "pickup" ? "Ambil di Toko" : "Antar ke Lokasi"
  
      if (pickupMethod === "pickup") {
        const storeSelect = document.getElementById("storeSelect")
        document.getElementById("confirmLocation").textContent = storeSelect.options[storeSelect.selectedIndex].text
      } else {
        document.getElementById("confirmLocation").textContent = document.getElementById("deliveryAddressText").value
      }
  
      document.getElementById("confirmName").textContent = document.getElementById("fullName").value
      document.getElementById("confirmEmail").textContent = document.getElementById("email").value
      document.getElementById("confirmPhone").textContent = document.getElementById("phone").value
      document.getElementById("confirmIdNumber").textContent = document.getElementById("idNumber").value
      document.getElementById("confirmEmergency").textContent =
        `${document.getElementById("emergencyName").value} - ${document.getElementById("emergencyPhone").value}`
    }
  
    function handleSubmit(e) {
      e.preventDefault()
  
      const agreeTerms = document.getElementById("agreeTerms").checked
      const agreeDeposit = document.getElementById("agreeDeposit").checked
  
      if (!agreeTerms || !agreeDeposit) {
        alert("Silakan setujui syarat dan ketentuan untuk melanjutkan.")
        return
      }
  
      // Generate booking code
      const bookingCode =
        "EXP-" + new Date().getFullYear() + "-" + String(Math.floor(Math.random() * 10000)).padStart(3, "0")
      document.getElementById("bookingCode").textContent = bookingCode
  
      // Show success modal
      const successModal = document.getElementById("successModal")
      successModal.style.display = "block"
  
      // Clear form after successful submission
      setTimeout(() => {
        clearBooking()
        successModal.style.display = "none"
      }, 2000)
    }
  
    function filterProducts() {
      const searchTerm = document.getElementById("productSearch").value.toLowerCase()
      const categoryFilter = document.getElementById("categoryFilter").value
  
      productItems.forEach((item) => {
        const name = item.dataset.name.toLowerCase()
        const category = item.closest("[data-category]").dataset.category
  
        const matchesSearch = name.includes(searchTerm)
        const matchesCategory = !categoryFilter || category === categoryFilter
  
        item.closest(".col-md-6").style.display = matchesSearch && matchesCategory ? "block" : "none"
      })
    }
  
    function saveBookingDraft() {
      const bookingData = {
        selectedItems: selectedItems,
        startDate: startDate.value,
        endDate: endDate.value,
        customerInfo: {
          fullName: document.getElementById("fullName").value,
          email: document.getElementById("email").value,
          phone: document.getElementById("phone").value,
          idNumber: document.getElementById("idNumber").value,
          address: document.getElementById("address").value,
          emergencyName: document.getElementById("emergencyName").value,
          emergencyPhone: document.getElementById("emergencyPhone").value,
        },
        pickupMethod: document.querySelector('input[name="pickupMethod"]:checked')?.value,
        specialNotes: document.getElementById("specialNotes").value,
        currentStep: currentStep,
      }
  
      localStorage.setItem("explorex_booking_draft", JSON.stringify(bookingData))
  
      // Show success message
      const toast = document.createElement("div")
      toast.className = "toast align-items-center text-white bg-success border-0"
      toast.style.position = "fixed"
      toast.style.top = "20px"
      toast.style.right = "20px"
      toast.style.zIndex = "9999"
      toast.innerHTML = `
              <div class="d-flex">
                  <div class="toast-body">
                      <i class="fas fa-check me-2"></i>
                      Draft booking berhasil disimpan!
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="this.parentElement.remove()"></button>
              </div>
          `
  
      document.body.appendChild(toast)
  
      setTimeout(() => {
        document.body.removeChild(toast)
      }, 3000)
    }
  
    function clearBooking() {
      if (confirm("Apakah Anda yakin ingin menghapus semua data booking?")) {
        selectedItems = []
        currentStep = 1
        rentalDays = 0
  
        // Reset form
        document.getElementById("bookingForm").reset()
  
        // Reset step indicators
        goToStep(1)
  
        // Update displays
        updateSelectedItems()
        calculateDuration()
        updateSidebar()
        enableNextStep1()
  
        // Clear localStorage
        localStorage.removeItem("explorex_booking_draft")
  
        // Reset pickup method visibility
        deliveryAddressDiv.classList.add("d-none")
        storeLocationDiv.classList.remove("d-none")
      }
    }
  
    function loadBookingDraft() {
      const savedData = localStorage.getItem("explorex_booking_draft")
      if (savedData) {
        try {
          const bookingData = JSON.parse(savedData)
  
          // Restore selected items
          selectedItems = bookingData.selectedItems || []
  
          // Restore form data
          if (bookingData.startDate) startDate.value = bookingData.startDate
          if (bookingData.endDate) endDate.value = bookingData.endDate
  
          if (bookingData.customerInfo) {
            const info = bookingData.customerInfo
            document.getElementById("fullName").value = info.fullName || ""
            document.getElementById("email").value = info.email || ""
            document.getElementById("phone").value = info.phone || ""
            document.getElementById("idNumber").value = info.idNumber || ""
            document.getElementById("address").value = info.address || ""
            document.getElementById("emergencyName").value = info.emergencyName || ""
            document.getElementById("emergencyPhone").value = info.emergencyPhone || ""
          }
  
          if (bookingData.pickupMethod) {
            document.querySelector(`input[name="pickupMethod"][value="${bookingData.pickupMethod}"]`).checked = true
            handlePickupMethodChange()
          }
  
          if (bookingData.specialNotes) {
            document.getElementById("specialNotes").value = bookingData.specialNotes
          }
  
          // Update displays
          updateSelectedItems()
          calculateDuration()
          updateSidebar()
          enableNextStep1()
  
          // Show notification
          const toast = document.createElement("div")
          toast.className = "toast align-items-center text-white bg-info border-0"
          toast.style.position = "fixed"
          toast.style.top = "20px"
          toast.style.right = "20px"
          toast.style.zIndex = "9999"
          toast.innerHTML = `
                      <div class="d-flex">
                          <div class="toast-body">
                              <i class="fas fa-info-circle me-2"></i>
                              Draft booking dimuat dari penyimpanan lokal
                          </div>
                          <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="this.parentElement.remove()"></button>
                      </div>
                  `
  
          document.body.appendChild(toast)
  
          setTimeout(() => {
            document.body.removeChild(toast)
          }, 3000)
        } catch (error) {
          console.error("Error loading booking draft:", error)
        }
      }
    }
  
    // Make functions globally accessible
    window.updateItemQuantity = updateItemQuantity
    window.removeItem = removeItem
  
    // Load saved draft on page load
    loadBookingDraft()
  })
  
  // Additional utility functions
  function formatCurrency(amount) {
    return new Intl.NumberFormat("en-US", {
      style: "currency",
      currency: "USD",
    }).format(amount)
  }
  
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return re.test(email)
  }
  
  function validatePhone(phone) {
    const re = /^[+]?[1-9][\d]{0,15}$/
    return re.test(phone.replace(/[\s\-$$$$]/g, ""))
  }
  
  // Form validation helpers
  document.addEventListener("DOMContentLoaded", () => {
    // Real-time email validation
    const emailField = document.getElementById("email")
    emailField?.addEventListener("blur", function () {
      if (this.value && !validateEmail(this.value)) {
        this.classList.add("is-invalid")
        if (!this.nextElementSibling || !this.nextElementSibling.classList.contains("invalid-feedback")) {
          const feedback = document.createElement("div")
          feedback.className = "invalid-feedback"
          feedback.textContent = "Format email tidak valid"
          this.parentNode.appendChild(feedback)
        }
      } else {
        this.classList.remove("is-invalid")
        const feedback = this.nextElementSibling
        if (feedback && feedback.classList.contains("invalid-feedback")) {
          feedback.remove()
        }
      }
    })
  
    // Real-time phone validation
    const phoneField = document.getElementById("phone")
    phoneField?.addEventListener("blur", function () {
      if (this.value && !validatePhone(this.value)) {
        this.classList.add("is-invalid")
        if (!this.nextElementSibling || !this.nextElementSibling.classList.contains("invalid-feedback")) {
          const feedback = document.createElement("div")
          feedback.className = "invalid-feedback"
          feedback.textContent = "Format nomor telepon tidak valid"
          this.parentNode.appendChild(feedback)
        }
      } else {
        this.classList.remove("is-invalid")
        const feedback = this.nextElementSibling
        if (feedback && feedback.classList.contains("invalid-feedback")) {
          feedback.remove()
        }
      }
    })
  
    // Auto-format phone numbers
    const phoneFields = document.querySelectorAll('input[type="tel"]')
    phoneFields.forEach((field) => {
      field.addEventListener("input", function () {
        let value = this.value.replace(/\D/g, "")
        if (value.length > 0) {
          if (value.length <= 3) {
            value = value
          } else if (value.length <= 6) {
            value = value.slice(0, 3) + "-" + value.slice(3)
          } else if (value.length <= 10) {
            value = value.slice(0, 3) + "-" + value.slice(3, 6) + "-" + value.slice(6)
          } else {
            value = value.slice(0, 3) + "-" + value.slice(3, 6) + "-" + value.slice(6, 10)
          }
        }
        this.value = value
      })
    })
  })
  