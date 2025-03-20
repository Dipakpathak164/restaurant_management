<!DOCTYPE html>
<html lang="en">

<head>
    <?php
   if (isset($title)) {
      echo $title;
   }
   ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php

       if(isset($metatags)){
           echo $metatags;
        }

       ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo IMAGE_PATH?>White-Logo2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo IMAGE_PATH?>White-Logo2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo IMAGE_PATH?>White-Logo2.png">

    <link href="<?php echo CSS_PATH. 'bootstrap.min' .CSS_EXT?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo FONT_AWESOME?>all.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH. 'style_home' .CSS_EXT?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH. 'style_web' .CSS_EXT?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH. 'style_ie' .CSS_EXT?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH. 'animate' .CSS_EXT?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>owl.theme.default.min.css">
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <link href="<?php echo CSS_PATH. 'theme.min' .CSS_EXT?>" rel="stylesheet" />
    <script src="<?php echo JS_PATH. 'jquery.min.js' ?>"></script>



    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
         @font-face {
      font-family: "MazzardH-Bold";
      src: url("<?php echo FONT_PATH ?>MazzardH-Bold.otf");
     }

     @font-face {
     font-family: "MazzardH-SemiBold";
     src: url("<?php echo FONT_PATH ?>MazzardH-SemiBold.otf");
    }  

     @font-face {
      font-family: "MazzardH-Medium";
      src: url("<?php echo FONT_PATH ?>MazzardH-Medium.otf");
      }

     @font-face {
      font-family: "MazzardH-Regular";
      src: url("<?php echo FONT_PATH ?>MazzardH-Regular.otf");
     }
     @font-face {
      font-family: "IntroRust-Base";
      src: url("<?php echo FONT_PATH ?>IntroRust-Base.otf");
     }
        .goog-te-gadget-icon {
            display: none !important;
        }

        .goog-te-gadget-simple {
            font-size: 16px !important;
            color: #23233f !important;
            font-weight: 500 !important;
            border: none !important;
        }

        html,
        body {
            height: 100%;
        }

        #wrap {
            min-height: 92%;
        }

        tfoot {
            display: table-header-group;
        }
    </style>
    <!--START snackbar CSS and JS-->
    <style>
        #snackbar {
    visibility: hidden;
    min-width: 250px;
    background-color: #4CAF50; /* Green for success */
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 16px;
    position: fixed;
    z-index: 1000;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
    transform: translateX(-50%);
}

#snackbar_error {
    visibility: hidden;
    min-width: 250px;
    background-color: #FF5733; /* Red/Orange for error */
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 16px;
    position: fixed;
    z-index: 1000;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
    transform: translateX(-50%);
}

#snackbar.show, #snackbar_error.show {
    visibility: visible;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@keyframes fadein {
    from { bottom: 0; opacity: 0; }
    to { bottom: 30px; opacity: 1; }
}

@keyframes fadeout {
    from { bottom: 30px; opacity: 1; }
    to { bottom: 0; opacity: 0; }
}

    </style>
</head>
<div id="snackbar"><?php echo $this->session->flashdata('success'); ?></div>
<div id="snackbar_error"><?php echo $this->session->flashdata('error'); ?></div>

<body class="bg-body">
    <!-- Notification container -->
    <div id="notification" class="notification text_copy_notify"></div>
    <div id="loader-body" style="display: none;">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>
    <div id="wrap">
        <div id="main" class="clear-top">
        <header>
            <div id="top__header" class="topheader">
               <div id="header">
                  <div class="container-lg">
                     <nav class="navbar navbar-expand-md px-md-0 py-nav">
                        <a href="<?php echo base_url() ?>" class="nav_brand animate__fadeInUp animate__animated">
                           <img src="<?php echo IMAGE_PATH ?>logo.png" alt="logo"  class="img-responsive" width="94">
                        </a>
                        <button class="d-md-none d-block toggler-button" id="sidebarCollapse" type="button">
                           <div class="bar-parents">
                              <div class="bar1"></div>
                              <div class="bar2"></div>
                              <div class="bar3"></div>
                           </div>
                        </button>
                        <!-- -closing menu by side click -->
                        <div class="d-xl-none d-block" id="side-click-close">
                        </div>
                        <div class="collapse navbar-collapse mobile-nav" id="navbarNav">
                           <ul class="contactLink">
                            <li>
                                Order by phone <br>
                                <a href="tel:9916819311">
                                9916819311
                                </a>
                            </li>
                           </ul>
                           <ul class="navbar-nav mx-auto main-ul">
                              <?php if (uri_string() == '') {
                                 echo "<li class='nav-item active'>";
                              } else {
                                 echo "<li class='nav-item'>";
                              } ?>
                              <a href="<?php echo base_url() ?>" class="nav-link animate__fadeInUp animate__animated">
                                 Home
                              </a>
                              </li>
                              <?php if (uri_string() == 'about-us') {
                                 echo "<li class='nav-item active'>";
                              } else {
                                 echo "<li class='nav-item'>";
                              } ?>
                              <a href="<?php echo base_url() ?>about-us" class="nav-link animate__fadeInUp animate__animated">
                                About Us
                              </a>
                              </li>
                              <?php if (uri_string() == 'faqs') {
                                 echo "<li class='nav-item active'>";
                              } else {
                                 echo "<li class='nav-item'>";
                              } ?>
                              <a href="<?php echo base_url() ?>faqs" class="nav-link animate__fadeInUp animate__animated">
                                FAQ
                              </a>
                              </li> 
                              <?php if (uri_string() == 'blogs') {
                                 echo "<li class='nav-item active'>";
                              } else {
                                 echo "<li class='nav-item'>";
                              } ?>
                              <a href="<?php echo base_url() ?>blogs" class="nav-link animate__fadeInUp animate__animated">
                                 Blogs
                              </a>
                              </li>
                              
                              <?php if (uri_string() == 'contact-us') {
                                 echo "<li class='nav-item active'>";
                              } else {
                                 echo "<li class='nav-item'>";
                              } ?>
                              <a href="<?php echo base_url() ?>contact-us" class="nav-link animate__fadeInUp animate__animated goService">
                                Contact Us
                              </a>
                              </li>
                           </ul>
                           <ul>
                            <li class="mr-md-3">
                              <a href="#" class="btn unique-button unique-button-border">
                                Menu
                              </a>
                            </li>
                           </ul>
                           <?php if (!$this->user_id): ?>

                              <!-- right Button -->
                            <a href="<?php echo base_url() ?>login" class="btn unique-button animate__animated  animate__heartBeat d-inline-flex align-items-center justify-content-center">
                             Login
                            </a>
                           <!-- /right Button -->
                           <?php else: ?>
                           <!-- Uncomment the below Ul to show the post login profiles and button -->
                           <ul class="d-flex">
                              <li>
                                <a href="<?php echo base_url() ?>" class="btn unique-button unique-button-border unique-button-border_plan animate__animated  animate__heartBeat d-inline-flex align-items-center justify-content-center poppins-semibold">
                                Our Pricing Plans <img src="<?php echo IMAGE_PATH?>stars.svg" alt="stars">
                                </a>
                              </li>
                              <li class="nav-item dropdown custom_dropdown  me-0  d-blockAfterLogin">
                                 <a data-bs-toggle="dropdown" class="dropdown-toggle" href="#">
                                 <img src="<?php echo IMAGE_PATH ?>no-profile.png" class="userProfileImg" alt="profile" width="36">
                                 </a>
                                 <ul class="dropdown-menu dd-menu">
                                   <li class="nav-item dropdown-menu_menu">
                                     <a class="nav-link" href="#" id="menu_profile"><img src="<?php echo IMAGE_PATH?>profile-circle.png" alt="profile-circle"> My Profile</a>
                                   </li>
                                   <li class="nav-item dropdown-menu_menu mb-0">
                                      <a class="nav-link" href="<?php echo base_url() ?>dashboard/logout"><img src="<?php echo IMAGE_PATH?>logoutNew.png" alt="logoutNew"> Logout</a>
                                    </li>
                                  </ul>
                              </li>
                           </ul>
                           <?php endif; ?>

                            
                        
                           <!-- Social Icons -->
                        </div>
                     </nav>
                  </div>
               </div>
         </header>
         <script>
            $(document).ready(function() {
               $('#sidebarCollapse, #closeMenu, #side-click-close,.goService').on('click', function() {
                  $('#sidebarCollapse, #navbarNav, #closeMenu,  #side-click-close').toggleClass(
                     'active');
                  $('#overlay_menu').toggleClass('bg-body');
                  $('body').toggleClass('stop-scroll');
                  $('a[aria-expanded=true]').attr('aria-expanded', 'false');
               });
               //  window.onload = function() {
               //     window.scrollTo(0, 0);
               //  }

            });
           window.addEventListener("scroll", function () {
            let navbar = document.querySelector(".topheader");
            if (window.scrollY >= 40) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
         </script>
         
  