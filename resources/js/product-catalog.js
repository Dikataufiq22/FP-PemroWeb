// Product Catalog and Detail Page Management
class ProductCatalog {
  constructor() {
    this.products = this.initializeProducts()
    this.currentProduct = null
    this.init()
  }

  initializeProducts() {
    return {
      "borneo-tent": {
        id: "borneo-tent",
        name: "Borneo Tent",
        category: "Tents",
        price: 7,
        rating: 4.8,
        reviews: 124,
        capacity: "2 persons",
        weight: "3.2kg",
        dimensions: "210 x 140 x 110 cm",
        material: "Ripstop Nylon",
        waterproof: "3000mm",
        brand: "ExploreX",
        availability: "In Stock",
        shortDescription: "Lightweight 2-person tent perfect for hiking and camping adventures.",
        fullDescription: `The Borneo Tent is designed for adventurers who demand reliability and comfort in the wilderness. 
        Crafted with high-quality ripstop nylon and featuring a robust aluminum frame, this tent offers excellent 
        protection against the elements while remaining lightweight and easy to set up. The spacious interior 
        comfortably accommodates two people with gear, while the vestibule provides additional storage space.`,
        features: [
          "Quick setup in under 5 minutes",
          "Double-wall construction for superior ventilation",
          "Waterproof rating of 3000mm",
          "Lightweight aluminum poles",
          "Multiple storage pockets",
          "Reflective guy lines for night visibility",
          "Compact pack size",
          "UV-resistant fabric",
        ],
        specifications: {
          "Setup Time": "5 minutes",
          "Floor Area": "2.9 m²",
          "Peak Height": "110 cm",
          "Packed Size": "45 x 15 cm",
          "Pole Material": "Aluminum 7001-T6",
          "Floor Material": "Polyethylene",
          Rainfly: "Polyester with PU coating",
          Seasons: "3-season",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Borneo+Tent+Main",
          "/placeholder.svg?height=400&width=600&text=Borneo+Tent+Interior",
          "/placeholder.svg?height=400&width=600&text=Borneo+Tent+Setup",
          "/placeholder.svg?height=400&width=600&text=Borneo+Tent+Packed",
        ],
        videos: [
          {
            title: "Setup Guide",
            thumbnail: "/placeholder.svg?height=200&width=300&text=Setup+Video",
            duration: "3:45",
          },
        ],
        accessories: ["tent-footprint", "gear-loft"],
        tags: ["hiking", "camping", "lightweight", "waterproof"],
      },
      "eiger-poles": {
        id: "eiger-poles",
        name: "Eiger Trekking Poles",
        category: "Hiking Gear",
        price: 4,
        rating: 4.6,
        reviews: 89,
        capacity: "Adjustable",
        weight: "0.5kg",
        dimensions: "65-135 cm",
        material: "Carbon Fiber",
        brand: "Eiger",
        availability: "In Stock",
        shortDescription: "Lightweight adjustable trekking poles for enhanced stability and support.",
        fullDescription: `The Eiger Trekking Poles are engineered for serious hikers and mountaineers who need 
        reliable support on challenging terrain. Made from premium carbon fiber, these poles offer exceptional 
        strength while remaining incredibly lightweight. The advanced locking mechanism ensures secure adjustment, 
        while the ergonomic grips provide comfort during extended use.`,
        features: [
          "Carbon fiber construction",
          "Quick-lock adjustment system",
          "Ergonomic cork grips",
          "Shock-absorbing technology",
          "Interchangeable tips",
          "Wrist straps included",
          "Compact folding design",
          "Anti-slip rubber tips",
        ],
        specifications: {
          "Length Range": "65-135 cm",
          "Collapsed Length": "35 cm",
          "Grip Material": "Natural Cork",
          "Shaft Material": "Carbon Fiber",
          "Tip Material": "Tungsten Carbide",
          "Locking System": "Twist Lock",
          "Weight per Pole": "250g",
          "Max User Weight": "120kg",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Eiger+Poles+Main",
          "/placeholder.svg?height=400&width=600&text=Eiger+Poles+Extended",
          "/placeholder.svg?height=400&width=600&text=Eiger+Poles+Collapsed",
          "/placeholder.svg?height=400&width=600&text=Eiger+Poles+Tips",
        ],
        videos: [
          {
            title: "Adjustment Guide",
            thumbnail: "/placeholder.svg?height=200&width=300&text=Adjustment+Video",
            duration: "2:30",
          },
        ],
        accessories: ["snow-baskets", "mud-baskets"],
        tags: ["hiking", "trekking", "lightweight", "adjustable"],
      },
      "speeds-sleeping-bag": {
        id: "speeds-sleeping-bag",
        name: "Speeds Sleeping Bag",
        category: "Sleeping Gear",
        price: 4,
        rating: 4.7,
        reviews: 156,
        capacity: "1 person",
        weight: "1.2kg",
        dimensions: "220 x 80 cm",
        material: "Down Fill",
        temperature: "-5°C to 10°C",
        brand: "Speeds",
        availability: "In Stock",
        shortDescription: "Compact down sleeping bag for comfortable nights in various weather conditions.",
        fullDescription: `The Speeds Sleeping Bag combines premium down insulation with a lightweight design 
        to deliver exceptional warmth-to-weight ratio. Perfect for three-season camping, this sleeping bag 
        features a mummy design that maximizes thermal efficiency while minimizing pack size. The water-resistant 
        shell and DWR treatment provide protection against moisture.`,
        features: [
          "650-fill power down insulation",
          "Mummy shape for thermal efficiency",
          "Water-resistant shell fabric",
          "Anti-snag zipper system",
          "Internal pocket for valuables",
          "Compression stuff sack included",
          "Draft collar and hood",
          "Machine washable",
        ],
        specifications: {
          "Temperature Rating": "Comfort: 5°C, Limit: 0°C, Extreme: -15°C",
          "Fill Type": "650 Fill Power Duck Down",
          "Shell Fabric": "20D Nylon Ripstop",
          "Lining Fabric": "20D Nylon Taffeta",
          Zipper: "YKK #5 Anti-snag",
          "Stuff Sack Size": "25 x 15 cm",
          "Max User Height": "185 cm",
          "Shoulder Girth": "150 cm",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Speeds+Bag+Main",
          "/placeholder.svg?height=400&width=600&text=Speeds+Bag+Open",
          "/placeholder.svg?height=400&width=600&text=Speeds+Bag+Packed",
          "/placeholder.svg?height=400&width=600&text=Speeds+Bag+Interior",
        ],
        videos: [
          {
            title: "Packing Guide",
            thumbnail: "/placeholder.svg?height=200&width=300&text=Packing+Video",
            duration: "4:15",
          },
        ],
        accessories: ["sleeping-pad", "pillow"],
        tags: ["sleeping", "down", "lightweight", "compact"],
      },
      "columbia-headlight": {
        id: "columbia-headlight",
        name: "Columbia Headlight",
        category: "Headlight",
        price: 2,
        rating: 4.5,
        reviews: 67,
        capacity: "LED",
        weight: "0.2kg",
        dimensions: "8 x 6 x 4 cm",
        material: "ABS Plastic",
        battery: "3 AAA",
        brand: "Columbia",
        availability: "In Stock",
        shortDescription: "Bright LED headlight for hands-free illumination during outdoor activities.",
        fullDescription:
          "The Columbia Headlight provides reliable hands-free lighting for all your outdoor adventures...",
        features: [
          "Adjustable brightness settings",
          "Water-resistant design",
          "Comfortable and adjustable headband",
          "Long battery life",
          "Lightweight and compact",
        ],
        specifications: {
          Brightness: "150 Lumens",
          "Beam Distance": "50 meters",
          "Battery Type": "3 x AAA",
          Runtime: "Up to 10 hours",
          Weight: "0.2kg",
          Material: "ABS Plastic",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Columbia+Headlight+Main",
          "/placeholder.svg?height=400&width=600&text=Columbia+Headlight+On",
          "/placeholder.svg?height=400&width=600&text=Columbia+Headlight+Side",
        ],
        videos: [],
        accessories: [],
        tags: ["headlight", "led", "hiking", "camping"],
      },
      "tendaki-tent": {
        id: "tendaki-tent",
        name: "Tendaki Tent",
        category: "Tent",
        price: 5,
        rating: 4.6,
        reviews: 89,
        capacity: "3 persons",
        weight: "4.2kg",
        dimensions: "240 x 180 x 130 cm",
        material: "Polyester",
        waterproof: "2000mm",
        brand: "Tendaki",
        availability: "In Stock",
        shortDescription: "Spacious 3-person tent perfect for family camping trips.",
        fullDescription: "The Tendaki Tent offers excellent space and comfort for family outdoor adventures...",
        features: [
          "Easy setup with color-coded poles",
          "Large front entrance for easy access",
          "Ventilation windows for airflow",
          "Internal storage pockets",
          "Waterproof floor and rainfly",
        ],
        specifications: {
          Capacity: "3 Person",
          Seasons: "3-Season",
          "Floor Area": "4.3 m²",
          "Peak Height": "130 cm",
          "Packed Size": "60 x 20 cm",
          Weight: "4.2kg",
          "Waterproof Rating": "2000mm",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Tendaki+Tent+Main",
          "/placeholder.svg?height=400&width=600&text=Tendaki+Tent+Interior",
          "/placeholder.svg?height=400&width=600&text=Tendaki+Tent+Setup",
        ],
        videos: [],
        accessories: [],
        tags: ["tent", "camping", "family", "waterproof"],
      },
      "mountain-bag": {
        id: "mountain-bag",
        name: "Mountain Hiking Backpack",
        category: "Backpack",
        price: 6,
        rating: 4.8,
        reviews: 112,
        capacity: "50L",
        weight: "1.5kg",
        dimensions: "60 x 30 x 20 cm",
        material: "Nylon",
        brand: "Mountain",
        availability: "In Stock",
        shortDescription: "Durable and spacious hiking backpack for multi-day adventures.",
        fullDescription: "The Mountain Hiking Backpack is designed for serious hikers...",
        features: [
          "Adjustable shoulder straps",
          "Multiple compartments and pockets",
          "Water-resistant material",
          "Breathable back panel",
          "Rain cover included",
        ],
        specifications: {
          Capacity: "50 Liters",
          Weight: "1.5kg",
          Material: "Nylon",
          Dimensions: "60 x 30 x 20 cm",
          "Number of Pockets": "8",
          "Water Resistance": "Yes",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Mountain+Bag+Main",
          "/placeholder.svg?height=400&width=600&text=Mountain+Bag+Side",
          "/placeholder.svg?height=400&width=600&text=Mountain+Bag+Back",
        ],
        videos: [],
        accessories: [],
        tags: ["backpack", "hiking", "trekking", "water-resistant"],
      },
      "toogh-tent": {
        id: "toogh-tent",
        name: "Toogh 3-4 Person Tent",
        category: "Tent",
        price: 8,
        rating: 4.9,
        reviews: 145,
        capacity: "4 persons",
        weight: "4.8kg",
        dimensions: "210 x 210 x 140 cm",
        material: "Oxford Cloth",
        waterproof: "3000mm",
        brand: "Toogh",
        availability: "In Stock",
        shortDescription: "Instant setup tent for quick and easy camping.",
        fullDescription: "The Toogh 3-4 Person Tent is perfect for campers who value convenience...",
        features: [
          "Instant setup in seconds",
          "Double-layer design",
          "Excellent ventilation",
          "Waterproof and windproof",
          "Spacious interior",
        ],
        specifications: {
          Capacity: "3-4 Person",
          Seasons: "4-Season",
          "Floor Area": "4.4 m²",
          "Peak Height": "140 cm",
          "Packed Size": "85 x 18 cm",
          Weight: "4.8kg",
          "Waterproof Rating": "3000mm",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Toogh+Tent+Main",
          "/placeholder.svg?height=400&width=600&text=Toogh+Tent+Setup",
          "/placeholder.svg?height=400&width=600&text=Toogh+Tent+Interior",
        ],
        videos: [],
        accessories: [],
        tags: ["tent", "instant setup", "camping", "waterproof"],
      },
      "salomon-shoe": {
        id: "salomon-shoe",
        name: "Salomon Speedcross 5",
        category: "Shoes",
        price: 9,
        rating: 4.7,
        reviews: 98,
        capacity: "N/A",
        weight: "0.32kg",
        dimensions: "N/A",
        material: "Synthetic",
        brand: "Salomon",
        availability: "In Stock",
        shortDescription: "Trail running shoe with aggressive grip for any terrain.",
        fullDescription: "The Salomon Speedcross 5 is designed for trail runners...",
        features: [
          "Aggressive lug pattern",
          "Precise fit",
          "Quicklace system",
          "Lightweight and durable",
          "Water-resistant",
        ],
        specifications: {
          Weight: "320g",
          "Upper Material": "Synthetic",
          Midsole: "EnergyCell+",
          Outsole: "Contagrip TA",
          Drop: "10mm",
          "Lacing System": "Quicklace",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Salomon+Shoe+Main",
          "/placeholder.svg?height=400&width=600&text=Salomon+Shoe+Side",
          "/placeholder.svg?height=400&width=600&text=Salomon+Shoe+Sole",
        ],
        videos: [],
        accessories: [],
        tags: ["shoes", "trail running", "salomon", "grip"],
      },
      "naturehike-bag": {
        id: "naturehike-bag",
        name: "Naturehike Ultralight Backpack",
        category: "Backpack",
        price: 5,
        rating: 4.6,
        reviews: 76,
        capacity: "40L",
        weight: "0.76kg",
        dimensions: "55 x 22 x 18 cm",
        material: "Nylon",
        brand: "Naturehike",
        availability: "In Stock",
        shortDescription: "Ultralight and foldable backpack for day hikes and travel.",
        fullDescription: "The Naturehike Ultralight Backpack is designed for minimalist hikers...",
        features: [
          "Ultralight and foldable",
          "Water-resistant material",
          "Breathable mesh shoulder straps",
          "Multiple pockets",
          "Durable construction",
        ],
        specifications: {
          Capacity: "40 Liters",
          Weight: "760g",
          Material: "Nylon",
          Dimensions: "55 x 22 x 18 cm",
          "Packed Size": "22 x 10 cm",
          "Water Resistance": "Yes",
        },
        images: [
          "/placeholder.svg?height=400&width=600&text=Naturehike+Bag+Main",
          "/placeholder.svg?height=400&width=600&text=Naturehike+Bag+Folded",
          "/placeholder.svg?height=400&width=600&text=Naturehike+Bag+Back",
        ],
        videos: [],
        accessories: [],
        tags: ["backpack", "ultralight", "hiking", "travel"],
      },
    }
  }

  init() {
    this.createDetailPageContainer()
    this.bindEvents()
  }

  createDetailPageContainer() {
    // Create detail page container if it doesn't exist
    if (!document.getElementById("productDetailPage")) {
      const detailPage = document.createElement("div")
      detailPage.id = "productDetailPage"
      detailPage.className = "product-detail-page d-none"
      detailPage.innerHTML = this.getDetailPageTemplate()
      document.body.appendChild(detailPage)
    }
  }

  getDetailPageTemplate() {
    return `
      <div class="detail-overlay">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <nav class="detail-breadcrumb py-3">
                <div class="container">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                      <a href="#" onclick="productCatalog.closeDetailPage()" class="text-success text-decoration-none">
                        <i class="fas fa-home me-1"></i>Home
                      </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#catalog" onclick="productCatalog.closeDetailPage()" class="text-success text-decoration-none">Catalog</a>
                    </li>
                    <li class="breadcrumb-item active" id="productBreadcrumb">Product</li>
                  </ol>
                </div>
              </nav>
            </div>
          </div>
          
          <div class="container py-4">
            <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="product-gallery">
                  <div class="main-image-container mb-3">
                    <img id="mainProductImage" src="/placeholder.svg" alt="" class="img-fluid rounded shadow">
                    <div class="image-zoom-overlay">
                      <i class="fas fa-search-plus"></i>
                    </div>
                  </div>
                  <div class="thumbnail-container">
                    <div class="row" id="imageThumbnails"></div>
                  </div>
                  <div class="video-section mt-3" id="productVideos"></div>
                </div>
              </div>
              
              <div class="col-lg-6">
                <div class="product-info">
                  <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge bg-success" id="productCategory">Category</span>
                    <button class="btn btn-outline-secondary btn-sm" onclick="productCatalog.closeDetailPage()">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  
                  <h1 class="product-title mb-3" id="productTitle">Product Name</h1>
                  
                  <div class="rating-section mb-3">
                    <div class="d-flex align-items-center">
                      <div class="stars me-2" id="productStars"></div>
                      <span class="rating-text text-muted" id="productRating">0.0</span>
                      <span class="review-count text-muted ms-2" id="reviewCount">(0 reviews)</span>
                    </div>
                  </div>
                  
                  <div class="price-section mb-4">
                    <div class="d-flex align-items-center">
                      <span class="price text-success fw-bold fs-2" id="productPrice">$0</span>
                      <span class="price-period text-muted ms-2">/day</span>
                      <span class="availability-badge ms-auto" id="availabilityBadge"></span>
                    </div>
                  </div>
                  
                  <div class="product-description mb-4">
                    <p id="productDescription">Product description...</p>
                  </div>
                  
                  <div class="key-specs mb-4">
                    <h5>Key Specifications</h5>
                    <div class="row" id="keySpecs"></div>
                  </div>
                  
                  <div class="rental-options mb-4">
                    <h5>Rental Options</h5>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Rental Duration</label>
                        <select class="form-select" id="rentalDuration">
                          <option value="1">1 Day - $<span class="day-price">0</span></option>
                          <option value="3">3 Days - $<span class="three-day-price">0</span> (5% off)</option>
                          <option value="7">1 Week - $<span class="week-price">0</span> (10% off)</option>
                          <option value="30">1 Month - $<span class="month-price">0</span> (20% off)</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>
                        <div class="input-group">
                          <button class="btn btn-outline-secondary" type="button" onclick="productCatalog.changeQuantity(-1)">-</button>
                          <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="10">
                          <button class="btn btn-outline-secondary" type="button" onclick="productCatalog.changeQuantity(1)">+</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="action-buttons mb-4">
                    <div class="d-grid gap-2 d-md-flex">
                      <button class="btn btn-success btn-lg flex-fill" onclick="productCatalog.addToCart()">
                        <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                      </button>
                      <button class="btn btn-outline-success btn-lg" onclick="productCatalog.addToWishlist()">
                        <i class="far fa-heart"></i>
                      </button>
                      <button class="btn btn-outline-secondary btn-lg" onclick="productCatalog.shareProduct()">
                        <i class="fas fa-share-alt"></i>
                      </button>
                    </div>
                  </div>
                  
                  <div class="product-tags" id="productTags"></div>
                </div>
              </div>
            </div>
            
            <!-- Detailed Information Tabs -->
            <div class="row mt-5">
              <div class="col-12">
                <ul class="nav nav-tabs" id="productTabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button">
                      Features
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button">
                      Specifications
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">
                      Reviews
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="accessories-tab" data-bs-toggle="tab" data-bs-target="#accessories" type="button">
                      Accessories
                    </button>
                  </li>
                </ul>
                
                <div class="tab-content mt-3" id="productTabContent">
                  <div class="tab-pane fade show active" id="features" role="tabpanel">
                    <div class="card border-0">
                      <div class="card-body">
                        <h5>Product Features</h5>
                        <ul id="featuresList" class="list-unstyled"></ul>
                      </div>
                    </div>
                  </div>
                  
                  <div class="tab-pane fade" id="specifications" role="tabpanel">
                    <div class="card border-0">
                      <div class="card-body">
                        <h5>Technical Specifications</h5>
                        <div class="table-responsive">
                          <table class="table table-striped" id="specificationsTable">
                            <tbody></tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="tab-pane fade" id="reviews" role="tabpanel">
                    <div class="card border-0">
                      <div class="card-body">
                        <h5>Customer Reviews</h5>
                        <div id="reviewsContainer"></div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="tab-pane fade" id="accessories" role="tabpanel">
                    <div class="card border-0">
                      <div class="card-body">
                        <h5>Recommended Accessories</h5>
                        <div id="accessoriesContainer"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `
  }

  viewProduct(productId) {
    const product = this.products[productId]
    if (!product) return

    this.currentProduct = product
    this.populateProductDetails(product)
    this.showDetailPage()
  }

  populateProductDetails(product) {
    // Update breadcrumb
    document.getElementById("productBreadcrumb").textContent = product.name

    // Update basic info
    document.getElementById("productCategory").textContent = product.category
    document.getElementById("productTitle").textContent = product.name
    document.getElementById("productDescription").textContent = product.fullDescription
    document.getElementById("productPrice").textContent = `$${product.price}`

    // Update rating
    this.updateRating(product.rating, product.reviews)

    // Update availability
    this.updateAvailability(product.availability)

    // Update images
    this.updateProductImages(product.images)

    // Update videos
    this.updateProductVideos(product.videos)

    // Update key specs
    this.updateKeySpecs(product)

    // Update rental pricing
    this.updateRentalPricing(product.price)

    // Update features
    this.updateFeatures(product.features)

    // Update specifications
    this.updateSpecifications(product.specifications)

    // Update reviews
    this.updateReviews(product)

    // Update accessories
    this.updateAccessories(product.accessories)

    // Update tags
    this.updateTags(product.tags)
  }

  updateRating(rating, reviewCount) {
    const starsContainer = document.getElementById("productStars")
    const fullStars = Math.floor(rating)
    const hasHalfStar = rating % 1 !== 0

    let starsHTML = ""
    for (let i = 0; i < 5; i++) {
      if (i < fullStars) {
        starsHTML += '<i class="fas fa-star text-warning"></i>'
      } else if (i === fullStars && hasHalfStar) {
        starsHTML += '<i class="fas fa-star-half-alt text-warning"></i>'
      } else {
        starsHTML += '<i class="far fa-star text-warning"></i>'
      }
    }

    starsContainer.innerHTML = starsHTML
    document.getElementById("productRating").textContent = rating.toFixed(1)
    document.getElementById("reviewCount").textContent = `(${reviewCount} reviews)`
  }

  updateAvailability(availability) {
    const badge = document.getElementById("availabilityBadge")
    const isAvailable = availability === "In Stock"
    badge.className = `badge ${isAvailable ? "bg-success" : "bg-danger"}`
    badge.textContent = availability
  }

  updateProductImages(images) {
    const mainImage = document.getElementById("mainProductImage")
    const thumbnailContainer = document.getElementById("imageThumbnails")

    if (images && images.length > 0) {
      mainImage.src = images[0]
      mainImage.alt = this.currentProduct.name

      let thumbnailsHTML = ""
      images.forEach((image, index) => {
        thumbnailsHTML += `
          <div class="col-3 mb-2">
            <img src="${image}" alt="Thumbnail ${index + 1}" 
                 class="img-fluid rounded thumbnail-image ${index === 0 ? "active" : ""}"
                 onclick="productCatalog.changeMainImage('${image}', this)">
          </div>
        `
      })
      thumbnailContainer.innerHTML = thumbnailsHTML
    }
  }

  updateProductVideos(videos) {
    const videoContainer = document.getElementById("productVideos")
    if (videos && videos.length > 0) {
      let videosHTML = '<h6 class="mt-3">Product Videos</h6>'
      videos.forEach((video) => {
        videosHTML += `
          <div class="video-thumbnail mb-2">
            <div class="position-relative">
              <img src="${video.thumbnail}" alt="${video.title}" class="img-fluid rounded">
              <div class="video-play-overlay">
                <i class="fas fa-play-circle fa-2x text-white"></i>
              </div>
              <div class="video-duration">${video.duration}</div>
            </div>
            <small class="text-muted">${video.title}</small>
          </div>
        `
      })
      videoContainer.innerHTML = videosHTML
    }
  }

  updateKeySpecs(product) {
    const specsContainer = document.getElementById("keySpecs")
    const keySpecs = [
      { label: "Weight", value: product.weight },
      { label: "Capacity", value: product.capacity },
      { label: "Material", value: product.material },
      { label: "Brand", value: product.brand },
    ]

    let specsHTML = ""
    keySpecs.forEach((spec) => {
      if (spec.value) {
        specsHTML += `
          <div class="col-6 mb-2">
            <small class="text-muted d-block">${spec.label}</small>
            <strong>${spec.value}</strong>
          </div>
        `
      }
    })
    specsContainer.innerHTML = specsHTML
  }

  updateRentalPricing(basePrice) {
    const dayPrice = basePrice
    const threeDayPrice = Math.round(basePrice * 3 * 0.95)
    const weekPrice = Math.round(basePrice * 7 * 0.9)
    const monthPrice = Math.round(basePrice * 30 * 0.8)

    const select = document.getElementById("rentalDuration")
    select.innerHTML = `
      <option value="1">1 Day - $${dayPrice}</option>
      <option value="3">3 Days - $${threeDayPrice} (5% off)</option>
      <option value="7">1 Week - $${weekPrice} (10% off)</option>
      <option value="30">1 Month - $${monthPrice} (20% off)</option>
    `
  }

  updateFeatures(features) {
    const featuresList = document.getElementById("featuresList")
    let featuresHTML = ""
    features.forEach((feature) => {
      featuresHTML += `
        <li class="mb-2">
          <i class="fas fa-check-circle text-success me-2"></i>
          ${feature}
        </li>
      `
    })
    featuresList.innerHTML = featuresHTML
  }

  updateSpecifications(specifications) {
    const specsTable = document.getElementById("specificationsTable").querySelector("tbody")
    let specsHTML = ""
    Object.entries(specifications).forEach(([key, value]) => {
      specsHTML += `
        <tr>
          <td class="fw-bold">${key}</td>
          <td>${value}</td>
        </tr>
      `
    })
    specsTable.innerHTML = specsHTML
  }

  addToCart() {
    const quantity = Number.parseInt(document.getElementById("quantity").value)
    const duration = Number.parseInt(document.getElementById("rentalDuration").value)

    // Add to shopping cart
    shoppingCart.addToCart(
      this.currentProduct.id,
      this.currentProduct.name,
      this.currentProduct.price,
      this.currentProduct.images[0],
      quantity,
      duration,
    )
  }

  updateReviews(product) {
    const reviewsContainer = document.getElementById("reviewsContainer")
    // Sample reviews - in a real app, these would come from an API
    const sampleReviews = [
      {
        name: "Sarah Johnson",
        rating: 5,
        date: "2024-01-15",
        comment:
          "Excellent quality and very easy to set up. Used it on a 3-day hiking trip and it performed perfectly.",
        verified: true,
      },
      {
        name: "Mike Chen",
        rating: 4,
        date: "2024-01-10",
        comment:
          "Great product overall. Very lightweight and compact. Only minor issue was the zipper felt a bit stiff.",
        verified: true,
      },
      {
        name: "Emma Wilson",
        rating: 5,
        date: "2024-01-05",
        comment: "Perfect for our camping trip. Stayed dry even in heavy rain. Highly recommended!",
        verified: false,
      },
    ]

    let reviewsHTML = ""
    sampleReviews.forEach((review) => {
      const stars = this.generateStars(review.rating)
      reviewsHTML += `
        <div class="review-item border-bottom pb-3 mb-3">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
              <strong>${review.name}</strong>
              ${review.verified ? '<span class="badge bg-success ms-2">Verified</span>' : ""}
            </div>
            <small class="text-muted">${new Date(review.date).toLocaleDateString()}</small>
          </div>
          <div class="mb-2">${stars}</div>
          <p class="mb-0">${review.comment}</p>
        </div>
      `
    })
    reviewsContainer.innerHTML = reviewsHTML
  }

  updateAccessories(accessories) {
    const accessoriesContainer = document.getElementById("accessoriesContainer")
    // Sample accessories - in a real app, these would be actual products
    const accessoryData = {
      "tent-footprint": {
        name: "Tent Footprint",
        price: 2,
        image: "/placeholder.svg?height=100&width=100&text=Footprint",
      },
      "gear-loft": { name: "Gear Loft", price: 1, image: "/placeholder.svg?height=100&width=100&text=Gear+Loft" },
      "snow-baskets": {
        name: "Snow Baskets",
        price: 1,
        image: "/placeholder.svg?height=100&width=100&text=Snow+Baskets",
      },
      "mud-baskets": { name: "Mud Baskets", price: 1, image: "/placeholder.svg?height=100&width=100&text=Mud+Baskets" },
      "sleeping-pad": {
        name: "Sleeping Pad",
        price: 3,
        image: "/placeholder.svg?height=100&width=100&text=Sleeping+Pad",
      },
      pillow: { name: "Inflatable Pillow", price: 1, image: "/placeholder.svg?height=100&width=100&text=Pillow" },
    }

    let accessoriesHTML = '<div class="row">'
    accessories.forEach((accessoryId) => {
      const accessory = accessoryData[accessoryId]
      if (accessory) {
        accessoriesHTML += `
          <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100">
              <img src="${accessory.image}" class="card-img-top" alt="${accessory.name}">
              <div class="card-body">
                <h6 class="card-title">${accessory.name}</h6>
                <p class="card-text text-success fw-bold">$${accessory.price}/day</p>
                <button class="btn btn-outline-success btn-sm">Add to Cart</button>
              </div>
            </div>
          </div>
        `
      }
    })
    accessoriesHTML += "</div>"
    accessoriesContainer.innerHTML = accessoriesHTML
  }

  updateTags(tags) {
    const tagsContainer = document.getElementById("productTags")
    let tagsHTML = '<div class="mb-2"><small class="text-muted">Tags:</small></div>'
    tags.forEach((tag) => {
      tagsHTML += `<span class="badge bg-light text-dark me-1 mb-1">${tag}</span>`
    })
    tagsContainer.innerHTML = tagsHTML
  }

  generateStars(rating) {
    const fullStars = Math.floor(rating)
    const hasHalfStar = rating % 1 !== 0
    let starsHTML = ""

    for (let i = 0; i < 5; i++) {
      if (i < fullStars) {
        starsHTML += '<i class="fas fa-star text-warning"></i>'
      } else if (i === fullStars && hasHalfStar) {
        starsHTML += '<i class="fas fa-star-half-alt text-warning"></i>'
      } else {
        starsHTML += '<i class="far fa-star text-warning"></i>'
      }
    }
    return starsHTML
  }

  changeMainImage(imageSrc, thumbnail) {
    document.getElementById("mainProductImage").src = imageSrc

    // Update active thumbnail
    document.querySelectorAll(".thumbnail-image").forEach((img) => img.classList.remove("active"))
    thumbnail.classList.add("active")
  }

  changeQuantity(delta) {
    const quantityInput = document.getElementById("quantity")
    const currentValue = Number.parseInt(quantityInput.value)
    const newValue = Math.max(1, Math.min(10, currentValue + delta))
    quantityInput.value = newValue
  }

  addToWishlist() {
    this.showNotification("info", `Added ${this.currentProduct.name} to wishlist`)
  }

  shareProduct() {
    if (navigator.share) {
      navigator.share({
        title: this.currentProduct.name,
        text: this.currentProduct.shortDescription,
        url: window.location.href,
      })
    } else {
      // Fallback - copy to clipboard
      navigator.clipboard.writeText(window.location.href)
      this.showNotification("info", "Product link copied to clipboard")
    }
  }

  showDetailPage() {
    const detailPage = document.getElementById("productDetailPage")
    const mainContent = document.querySelector("body")

    // Add loading animation
    detailPage.classList.add("loading")
    detailPage.classList.remove("d-none")

    // Simulate loading time for smooth transition
    setTimeout(() => {
      detailPage.classList.remove("loading")
      mainContent.style.overflow = "hidden"
      detailPage.scrollTop = 0
    }, 300)
  }

  closeDetailPage() {
    const detailPage = document.getElementById("productDetailPage")
    const mainContent = document.querySelector("body")

    detailPage.classList.add("d-none")
    mainContent.style.overflow = "auto"

    // Scroll back to catalog section
    document.getElementById("catalog").scrollIntoView({ behavior: "smooth" })
  }

  showNotification(type, message) {
    // Create notification element
    const notification = document.createElement("div")
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`
    notification.style.cssText = "top: 20px; right: 20px; z-index: 9999; min-width: 300px;"
    notification.innerHTML = `
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `

    document.body.appendChild(notification)

    // Auto-remove after 3 seconds
    setTimeout(() => {
      if (notification.parentNode) {
        notification.remove()
      }
    }, 3000)
  }

  bindEvents() {
    // Close detail page on escape key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && !document.getElementById("productDetailPage").classList.contains("d-none")) {
        this.closeDetailPage()
      }
    })

    // Handle browser back button
    window.addEventListener("popstate", () => {
      if (!document.getElementById("productDetailPage").classList.contains("d-none")) {
        this.closeDetailPage()
      }
    })
  }
}

// Global function to view product (called from HTML)
let productCatalog
function viewProduct(productId) {
  productCatalog.viewProduct(productId)
}

// Initialize catalog when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  productCatalog = new ProductCatalog()
})
// Mock shoppingCart object for demonstration purposes
const shoppingCart = {
  addToCart: (productId, name, price, image, quantity, duration) => {
    console.log(`Added to cart: ${name} (ID: ${productId}), Quantity: ${quantity}, Duration: ${duration} days`)
    // In a real application, this would update the shopping cart data
  },
}
