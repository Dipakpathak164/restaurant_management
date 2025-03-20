    </div>
    </div>
    <footer class="wave-section">
    <svg viewBox="0 0 1440 200" xmlns="http://www.w3.org/2000/svg" class="wave">
        <path fill="#f5e7c1" d="M0,100 C360,200 1080,0 1440,100 V200 H0 Z"></path>
    </svg>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo IMAGE_PATH?>logo.png" alt="logo">
                </div>
                <div class="col-md-4">
                    <h6>
                    ABOUT US
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima animi iste quia nisi sapiente dicta quibusdam maiores sequi consequuntur. Pariatur in vitae enim est incidunt corporis suscipit aspernatur rem cupiditate tempore iure, ea vel nisi nulla mollitia sint obcaecati, quisquam soluta? Tenetur doloribus amet praesentium quaerat fugit est et dignissimos.
                    </p>
                </div>
                <div class="col-md-4 d-flex  justify-content-center">
                   <div>
                   <h6>
                        Quick Links
                    </h6>
                    <ul>
                        <li>
                            <a href="<?php echo base_url()?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>">Menu</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>">Blogs</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>">Contact Us</a>
                        </li>
                    </ul>
                   </div>
                </div>
                <div class="col-md-4 d-flex  align-items-center flex-column">
                    <div>
                    <h6>
                        Social Links
                    </h6>
                    <ul class="socialUl d-flex justify-content-center">
                <li>
                    <a href="#">
                        <img src="<?php echo IMAGE_PATH?>facebook-app-symbol.png" alt="facebook-app-symbol">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo IMAGE_PATH?>instagram.png" alt="instagram">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo IMAGE_PATH?>linkedin.png" alt="linkedin">
                    </a>
                </li>
            </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-6 py-4 copyRight">
                    <span>©2025 . All rights reserved</span>
                </div>
                <div class="col-md-6 py-4 text-right copyRight">
                   <a href="#">
                      Privacy Policy
                   </a>
                   <a href="#">
                      Terms & Service
                   </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo JS_PATH . 'modernizr.min.js' ?>"></script>
    <script src="<?php echo JS_PATH . 'moment.min.js' ?>"></script>
    <!-- <script src="<?php echo JS_PATH . 'popper.min.js' ?>"></script> -->
    <script src="<?php echo JS_PATH . 'bootstrap.bundle.min.js' ?>"></script>
    <script src="<?php echo JS_PATH . 'detect.js' ?>"></script>
    <script src="<?php echo JS_PATH . 'wow.min.js' ?>"></script>
    <script src="<?php echo JS_PATH . 'index.js' ?>"></script>
    <script src="<?php echo JS_PATH . 'jquery.blockUI.js' ?>"></script>
    <script src="<?php echo JS_PATH ?>owl.carousel.min.js"></script>
     <!-- jQuery (Required for Bootstrap Datepicker) -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- Bootstrap Datepicker JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',  // Change to 'yyyy-mm-dd' if needed
            autoclose: true,
            todayHighlight: true
        });

        $('#datepicker2').datepicker({
            format: 'dd/mm/yyyy',  // Change to 'yyyy-mm-dd' if needed
            autoclose: true,
            todayHighlight: true
        });
    });
    </script>
