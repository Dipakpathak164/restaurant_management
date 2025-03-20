
<main>
    <section class="product_details_wrapper mt-5">
        <div class="product_details_inner container">
            <div class="row">
                <!-- Left Column: Product Images -->
                <div class="col-md-6">
                    <div class="product-image-box">
                        <!-- Main Image with Zoom -->
                        <div class="main-image">
                            <img id="mainProductImage" src="<?php echo IMAGE_PATH?>product_01.jpg" alt="Product Image">
                            <div id="zoomLens"></div> <!-- Zoom Lens -->
                        </div>
                        <!-- Thumbnails -->
                        <!-- <div class="thumbnail-wrapper">
                            <img class="thumbnail" src="<?php echo IMAGE_PATH?>product_01.jpg" onmouseover="handleThumbnailHover(this)" onclick="handleThumbnailClick(this)">
                            <img class="thumbnail" src="<?php echo IMAGE_PATH?>p3.png" onmouseover="handleThumbnailHover(this)" onclick="handleThumbnailClick(this)">
                            <img class="thumbnail" src="<?php echo IMAGE_PATH?>product_01.jpg" onmouseover="handleThumbnailHover(this)" onclick="handleThumbnailClick(this)">
                            <img class="thumbnail" src="<?php echo IMAGE_PATH?>product_01.jpg" onmouseover="handleThumbnailHover(this)" onclick="handleThumbnailClick(this)">
                        </div> -->
                    </div>
                </div>

                <!-- Right Column: Product Details -->
                <div class="col-md-6 d-flex align-items-center ps-md-4 pe-md-0">
                    <div class="product-details">
                        <h2>Bacon+Cheese +Green Burger</h2>
                        <div class="price_display d-flex align-items-center">
                            <span  class="discount">
                            $6.00
                            </span>
                        </div>
                        <div class="prod_desc">
                            <h5 class="mb-2">Ingredients:</h5>
                             <p>
                             onion, oregano, bacon, cheese, ketchup, mustard, green salad
                             </p>
                        </div>
                        <div class="d-flex flexBtns">
                            <div class="increase_decreaseBtn position-relative">
                                <input type="text" value="1" id="quantityInput">
                                <span class="increase">
                                    <img src="<?php echo IMAGE_PATH?>increaseIcon.svg" alt="increaseIcon">
                                </span>
                                <span class="decrease">
                                    <img src="<?php echo IMAGE_PATH?>decreaseIcon.svg" alt="decreaseIcon">
                                </span>
                            </div>
                            <button class="btn unique-button">
                                Add to cart
                            </button>
                        </div>                                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 description">
                    <h3>
                        Description
                    </h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque consequatur cum sequi aut possimus reiciendis sit, ipsam tempore voluptatem saepe rerum natus reprehenderit quas mollitia maxime aliquam error dolor explicabo.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="d-none">
        <div class="related_product_div">
             <div class="row">
                <div class="col-md-12">
                    <h3 class="subTitle">
                        Related Products
                    </h3>
                </div>
             </div>
             <div class="row">
                <div class="col-md-12">
                    <div class="swiper myswiperProductItems">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                           <div class="swiper-slide position-relative">
                            <a href="<?php echo base_url()?>product-details" class="product_card_parent d-inline-block w-100">
                                <div class="product_card">
                                   <div class="product_card_img text-center">
                                      <img src="<?php echo IMAGE_PATH?>p1.png" alt="p1">
                                   </div>
                                   <hr>
                                   <div class="product_card_details">
                                      <h3>Himalaya Baby Gift ...</h3>
                                      <p>$10.00</p>
                                   </div>
                                </div>
                             </a>
                             <button class="btn btn_add_cart">
                                Add to Cart
                             </button>
                           </div>
                           <!-- Slides -->
                           <div class="swiper-slide position-relative">
                            <a href="<?php echo base_url()?>product-details" class="product_card_parent d-inline-block w-100">
                                <div class="product_card">
                                   <div class="product_card_img text-center">
                                      <img src="<?php echo IMAGE_PATH?>p2.png" alt="p1">
                                   </div>
                                   <hr>
                                   <div class="product_card_details">
                                      <h3>Diaper Products</h3>
                                      <p>$10.00</p>
                                   </div>
                                </div>
                             </a>
                             <button class="btn btn_add_cart">
                                Add to Cart
                             </button>
                           </div>
                           <!-- Slides -->
                           <div class="swiper-slide position-relative">
                            <a href="<?php echo base_url()?>product-details" class="product_card_parent d-inline-block w-100">
                                <div class="product_card">
                                   <div class="product_card_img text-center">
                                      <img src="<?php echo IMAGE_PATH?>p3.png" alt="p1">
                                   </div>
                                   <hr>
                                   <div class="product_card_details">
                                      <h3>Joie Gemm Infant ...</h3>
                                      <p>$10.00</p>
                                   </div>
                                </div>
                             </a>
                             <button class="btn btn_add_cart">
                                Add to Cart
                             </button>
                           </div>
                           <!-- Slides -->
                           <div class="swiper-slide position-relative">
                            <a href="<?php echo base_url()?>product-details" class="product_card_parent d-inline-block w-100">
                                <div class="product_card">
                                   <div class="product_card_img text-center">
                                      <img src="<?php echo IMAGE_PATH?>p4.png" alt="p1">
                                   </div>
                                   <hr>
                                   <div class="product_card_details">
                                      <h3>Nuna Trvl Compact ...</h3>
                                      <p>$10.00</p>
                                   </div>
                                </div>
                             </a>
                             <button class="btn btn_add_cart">
                                Add to Cart
                             </button>
                           </div>
                           <!-- Slides -->
                           <div class="swiper-slide position-relative">
                            <a href="<?php echo base_url()?>product-details" class="product_card_parent d-inline-block w-100">
                                <div class="product_card">
                                   <div class="product_card_img text-center">
                                      <img src="<?php echo IMAGE_PATH?>p1.png" alt="p1">
                                   </div>
                                   <hr>
                                   <div class="product_card_details">
                                      <h3>Himalaya Baby Gift ...</h3>
                                      <p>$10.00</p>
                                   </div>
                                </div>
                             </a>
                             <button class="btn btn_add_cart">
                                Add to Cart
                             </button>
                           </div>
                           <!-- Slides -->
                           <div class="swiper-slide position-relative">
                            <a href="<?php echo base_url()?>product-details" class="product_card_parent d-inline-block w-100">
                                <div class="product_card">
                                   <div class="product_card_img text-center">
                                      <img src="<?php echo IMAGE_PATH?>p2.png" alt="p1">
                                   </div>
                                   <hr>
                                   <div class="product_card_details">
                                      <h3>Diaper Products</h3>
                                      <p>$10.00</p>
                                   </div>
                                </div>
                             </a>
                             <button class="btn btn_add_cart">
                                Add to Cart
                             </button>
                           </div>
                        </div>
                    </div>  
                </div>
             </div>
        </div>
    </section>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const mainImage = document.getElementById("mainProductImage");
    const zoomLens = document.getElementById("zoomLens");
    const thumbnails = document.querySelectorAll(".thumbnail");

    // Function to update the main image
    function updateMainImage(src) {
        mainImage.src = src;
    }

    // Function to handle hover on thumbnails for larger screens
    function handleThumbnailHover(thumb) {
        if (window.innerWidth > 768) {  // Apply hover effect only on large screens
            updateMainImage(thumb.src);
        }
    }

    // Function to handle click on thumbnails for smaller screens
    function handleThumbnailClick(thumb) {
        if (window.innerWidth <= 768) { // Apply click effect only on small screens
            updateMainImage(thumb.src);
        }
    }

    // Zoom Effect for Large Screens
    function zoomEffect(event) {
        if (window.innerWidth > 768) { // Only apply zoom on large screens
            let posX = event.offsetX;
            let posY = event.offsetY;
            let width = mainImage.offsetWidth;
            let height = mainImage.offsetHeight;

            let zoomX = (posX / width) * 100;
            let zoomY = (posY / height) * 100;

            zoomLens.style.backgroundImage = `url(${mainImage.src})`;
            zoomLens.style.backgroundSize = "150%";
            zoomLens.style.backgroundPosition = `${zoomX}% ${zoomY}%`;
            zoomLens.style.display = "block";
        }
    }

    // Hide zoom effect when mouse leaves
    function hideZoom() {
        zoomLens.style.display = "none";
    }

    // Event Listeners
    mainImage.addEventListener("mousemove", zoomEffect);
    mainImage.addEventListener("mouseleave", hideZoom);

    // Assign event listeners to thumbnails
    thumbnails.forEach(thumb => {
        thumb.addEventListener("mouseover", function () {
            handleThumbnailHover(thumb);
        });
        thumb.addEventListener("click", function () {
            handleThumbnailClick(thumb);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("quantityInput");
    const increaseBtn = document.querySelector(".increase");
    const decreaseBtn = document.querySelector(".decrease");

    // Increase count
    increaseBtn.addEventListener("click", function () {
        let value = parseInt(input.value) || 1;
        input.value = value + 1;
    });

    // Decrease count, but not below 1
    decreaseBtn.addEventListener("click", function () {
        let value = parseInt(input.value) || 1;
        if (value > 1) {
            input.value = value - 1;
        }
    });

    // Prevent non-numeric input and allow manual input
    input.addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, ''); // Allow only numbers
    });

    // Ensure minimum value of 1 when focus is lost
    input.addEventListener("blur", function () {
        if (this.value === "" || parseInt(this.value) < 1) {
            this.value = "1"; // Default to 1 if empty or invalid
        }
    });
});


</script>
