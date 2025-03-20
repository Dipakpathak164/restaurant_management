<style>
    .user_title {
        font-weight: 500;
        margin: auto 12px auto 0;
    }

    .bg-light-grey {
        background-color: #F9F9FA !important;
    }

    .company_modal {
        max-width: 800px;
    }

    .modal-background {
        background-color: #ffffff !important;
    }

    .company_modal_line {
        border-right: 1px solid #f3f3f3;
    }

    .headerbar .headerbar-left {
        /*background: #03cefc;*/
        background: white;
    }

    .main-sidebar {
        background: #ffffff !important;
    }

    #sidebar-menu>ul>li>a {
        color: #364967;
        display: block;
        padding: 17px 24px 17px 24px;
        font-weight: 600;
        font-size: .9rem;
    }

    #sidebar-menu>ul>li>a span b {
        font-weight: 600;
    }

    .notif .noti-title {
        border-radius: 0;
        background-color: #1D263A !important;
        margin: 0;
        width: auto;
        padding: 8px 15px 12px 15px;
    }

    .card-header {
        border-bottom: none;
    }

    .btn {
        background: #4C68F4;
        color: #ffffff;
        border: #4C68F4;
        font-size: 16px;
        height: 40px;
        border-radius: 8px !important;
        box-shadow: none !important;
        border: 1px solid #4C68F4 !important;
        font-weight: 600
    }

    button.btn-danger,a.btn-danger {
        background: #ff391f !important;
        border: #ff391f !important;
    }
    a.btn-danger{
        line-height: 1.65;
    }

    #sidebar-menu>ul>li>a:hover {
        background-color: #4C68F4;
        -webkit-transition: 0.3s;
        -moz-transition: 0.3s;
        -ms-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        color: #fff !important;
        /* box-shadow: 0 0px 10px rgba(0, 0, 0, 0.30), 0 8px 12px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow: 0 0px 10px rgba(0, 0, 0, 0.30), 0 8px 12px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0 0px 10px rgba(0, 0, 0, 0.30), 0 8px 12px rgba(0, 0, 0, 0.22);
        -ms-box-shadow: 0 0px 10px rgba(0, 0, 0, 0.30), 0 8px 12px rgba(0, 0, 0, 0.22); */
    }

    .active_menu a {
        background-color:#4C68F4;
        -webkit-transition: 0.3s;
        -moz-transition: 0.3s;
        -ms-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        color: #fff !important;
        font-weight: bold !important;
    }

    .active_menu a span b {
        font-weight: 600 !important;
    }

    #sidebar-menu>ul>li>a img {
        margin-right: 11px;
        width: 20px;
    }

    #sidebar-menu>ul>li>a img.icon-1 {
        display: none;
    }

    #sidebar-menu>ul>li>a img.icon-2 {
        display: inline-block;
    }

    .active_menu a img.icon-1 {
        display: inline-block;
    }

    #sidebar-menu>ul>li.active_menu>a img.icon-2 {
        display: none;
    }

    #sidebar-menu>ul>li.active_menu>a img.icon-1 {
        display: inline-block;
    }

    #sidebar-menu>ul>li>a:hover img.icon-1 {
        display: inline-block;
    }

    #sidebar-menu>ul>li>a:hover img.icon-2 {
        display: none;
    }

    .card-header {
        background: white;
    }

    .card-header h3 {
        color: black;
    }

    .custom-modal .modal-header {
        background: #dddddd;
        padding: 0 !important;
        color: #000000;
    }

    .custom-modal .modal-body .modal-footer {
        background-color: #ffffff;
    }

    .modal-content-customize {
        border: 0;
    }

    .table thead th {
        border-top: 0;
        background: #FFFFFF;
        color: 	#333333;
        vertical-align: middle;
        border-bottom: 0px solid #dee2e6;
        font-size: 12px;
        font-weight: 600 !important;
    }

    .table-bordered th {
        border: none;
    }

    .table-hover tbody tr {
        background-color: #F9F9FA;
    }

    .breadcrumb-holder {
        background-color: #F9F9F9;
        margin: 0 -19px 12px -24px;
    }

    .btn-primary.active,
    .btn-primary.focus,
    .btn-primary:active,
    .btn-primary:focus,
    .btn-primary:hover,
    .open>.dropdown-toggle.btn-primary {
        background-color: #008f6b;
        border-color: #008f6b;
        color: #fff;
    }

    .modal-footer {
        border-top: 0px solid #dee2e6;
    }


    textarea.form-control {
        height: 80px !important;
    }

    label {
        color: #104967 !important;
    }

    .address_height {
        height: auto !important;
    }

    a.subdrop span .fa-angle-left {
        width: 35px !important;
        display: inline-block !important;
        font-size: 13px !important;
        line-height: 17px !important;
    }

    a.subdrop span .fa-angle-left::before {
        content: '\f077' !important;
    }
</style>

<!-- top bar navigation -->
<div class="headerbar admin-menu">

    <!-- LOGO -->
    <div class="headerbar-left">
        <!-- <a href="<?php /*echo base_url() . 'dashboard/home'*/?>" class="logo"> -->
        <!-- <img alt="Logo" class="sidebar-logo" src="<?php echo IMAGE_PATH?>tech_jobs_logo.png" /> -->
        <!-- </a> -->
        <div class="menu-bars">
            <img src="<?php echo IMAGE_PATH?>menu.png" class="menu-mobile-bars open-left" alt="Open"
                id="mobile-menu-bars">
        </div>
    </div>

    <nav class="navbar-custom d-flex justify-content-md-end justify-content-between align-items-center">
        <ul class="list-inline float-right mb-0 sm_d_flex">
            <?php if ($this->role_id == ADMIN) { ?>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user pl_sm_0 d-inline-flex align-items-center"
                    data-toggle="dropdown" href="#" aria-expanded="false" id="dropdownMenuButton1">
                    <div class="user_profile">
                        <img src="<?php echo IMAGE_PATH?>VendorAvatar.png" alt="Profile image" class="avatar-rounded">
                    </div>
                    <div class="profile_desc">
                        <span class="user_title">
                            <?php 
                      echo $profile_variables->first_name . ' ' . $profile_variables->last_name; 
                     ?>
                        </span>
                        <small class="user_id">
                            breadcrumbs
                        </small>
                    </div>
                    <img src="<?php echo IMAGE_PATH?>arrow-down.png" alt="Profile image" class="dropdown_arrow">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="dropdownMenuButton1">
                    <a href="javascript:void(0)" data-toggle="modal" data-bs-target="#change_password"
                        class="dropdown-item notify-item">
                        <i class="fas fa-key"></i>
                        <span>Change Password</span>
                    </a>
                    <a href="<?php echo base_url()?>dashboard/logout" class="dropdown-item notify-item">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
            <?php } elseif($this->role_id == COMPANY_ADMIN){ ?>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user pl_sm_0 d-inline-flex align-items-center"
                    data-toggle="dropdown" href="#" aria-expanded="false" id="dropdownMenuButton1">
                    <div class="user_profile">
                        <img src="<?php echo IMAGE_PATH?>VendorAvatar.png" alt="Profile image" class="avatar-rounded">
                    </div>
                    <div class="profile_desc">
                        <span class="user_title">
                            <?php 
                      echo $profile_variables->first_name . ' ' . $profile_variables->last_name; 
                     ?>
                        </span>
                        <small class="user_id">
                        <?php 
                        // Dynamically display the user's email
                          echo $profile_variables->email; 
                        ?>
                        </small>
                    </div>
                    <img src="<?php echo IMAGE_PATH?>arrow-down.png" alt="Profile image" class="dropdown_arrow">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="dropdownMenuButton1">
                    <a href="javascript:void(0)" data-toggle="modal" data-bs-target="#change_password"
                        class="dropdown-item notify-item">
                        <i class="fas fa-key"></i>
                        <span>Change Password</span>
                    </a>
                    <a href="<?php echo base_url()?>dashboard/logout" class="dropdown-item notify-item">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
            <?php } elseif($this->role_id == USERS){ ?>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user pl_sm_0 d-inline-flex align-items-center"
                    data-toggle="dropdown" href="#" aria-expanded="false" id="dropdownMenuButton1">
                    <div class="user_profile">
                        <img src="<?php echo IMAGE_PATH?>VendorAvatar.png" alt="Profile image" class="avatar-rounded">
                    </div>
                    <div class="profile_desc">
                        <span class="user_title">
                            <?php 
                      echo $profile_variables->first_name . ' ' . $profile_variables->last_name; 
                     ?>
                        </span>
                        <small class="user_id">
                        <?php 
                        // Dynamically display the user's email
                          echo $profile_variables->email; 
                        ?>
                        </small>
                    </div>
                    <img src="<?php echo IMAGE_PATH?>arrow-down.png" alt="Profile image" class="dropdown_arrow">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="dropdownMenuButton1">
                    <a href="javascript:void(0)" data-toggle="modal" data-bs-target="#change_password"
                        class="dropdown-item notify-item">
                        <i class="fas fa-key"></i>
                        <span>Change Password</span>
                    </a>
                    <a href="<?php echo base_url()?>dashboard/logout" class="dropdown-item notify-item">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
            <?php } ?>

        </ul>

        <ul class="list-inline menu-left mb-0 d-md-none">
            <li class="float-left">
                <button class="button-menu-mobile open-left d-lg-none">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
<!-- End Navigation -->

<!-- Left Sidebar -->
<div class="left main-sidebar admin-main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">
            <div class="w-100 mx-auto text-center menu-header">
                <img alt="Logo" src="<?php echo IMAGE_PATH?>Black-Logo.webp" class="sidebar-logo mx-auto" width="168" />
            </div>
            <ul>
                <?php if ($this->role_id == ADMIN) { ?>
                <li class="submenu">
                    <?php if(uri_string() == 'dashboard/home'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'dashboard/home'?>" onclick="remove_settings_menu()">
                        <i class="fa fa-home"></i>
                        <span><b>Dashboard</b></span>
                    </a>
                </li>
                <li class="submenu">
                   <?php if(uri_string() == 'Dashboard/report_an_expense_list' || uri_string() == 'Dashboard/report_an_expense' || uri_string() == 'Dashboard/edit_report_expense'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/report_an_expense_list'?> " onclick="remove_settings_menu()">
                       <i class="fa fa-files-o" ></i>
                        <span><b>Report an Expense</b></span>
                    </a>
                </li>
                <li class="submenu">
                    <?php if(uri_string() == 'Dashboard/restaurant_onboarding' || uri_string() == 'Dashboard/add_restaurant_onboarding' || uri_string() == 'Dashboard/edit_restaurant_onboarding'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/restaurant_onboarding'?>" onclick="remove_settings_menu()">
                        <i class="fa fa-table"></i>
                        <span><b>Restaurant onboarding</b></span>
                    </a>
                </li>
                <li class="submenu">
                   <?php if(uri_string() == 'Dashboard/customers'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/customers'?> " onclick="remove_settings_menu()">
                       <i class="fa fa-list" ></i>
                        <span><b>Restaurant Onboarded</b></span>
                    </a>
                </li>
                <li class="submenu">
                   <?php if(uri_string() == 'Dashboard/company_users'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/company_users'?> " onclick="remove_settings_menu()">
                        <i class="fa fa-user" ></i>
                        <span><b>Users</b></span>
                    </a>
                </li>
              
                <?php } elseif($this->role_id == COMPANY_ADMIN){ ?>
                <li class="submenu">
                    <?php if(uri_string() == 'Dashboard/home' || uri_string() ==  'Dashboard/domo_dashboard2'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/home'?>" onclick="remove_settings_menu()">
                        <i class="fa fa-home"></i>
                        <span><b>Dashboard</b></span>
                    </a>
                </li>
                <li class="submenu">
                   <?php if(uri_string() == 'Dashboard/report_an_expense_list' || uri_string() == 'Dashboard/report_an_expense' || uri_string() == 'Dashboard/edit_report_expense'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/report_an_expense_list'?> " onclick="remove_settings_menu()">
                       <i class="fa fa-files-o" ></i>
                        <span><b>Report an Expense</b></span>
                    </a>
                </li>
                <li class="submenu">
                   <?php if(uri_string() == 'Dashboard/comp_users'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/comp_users'?> " onclick="remove_settings_menu()">
                       <i class="fa fa-user" ></i>
                        <span><b>Users</b></span>
                    </a>
                </li>
                <li class="submenu">
                   <?php if(uri_string() == 'Dashboard/view_locations'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/view_locations'?> " onclick="remove_settings_menu()">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span><b>All Locations</b></span>
                    </a>
                </li>

                <?php } elseif($this->role_id == USERS){ ?>
                <li class="submenu">
                    <?php if(uri_string() == 'Dashboard/home' || uri_string() ==  'Dashboard/domo_dashboard2'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/home'?>" onclick="remove_settings_menu()">
                        <i class="fa fa-home"></i>
                        <span><b>Dashboard</b></span>
                    </a>
                </li>
                <li class="submenu">
                   <?php if(uri_string() == 'Dashboard/report_an_expense_list' || uri_string() == 'Dashboard/report_an_expense' || uri_string() == 'Dashboard/edit_report_expense'){
                            echo "<li class='active_menu'>";
                        }else{
                            echo "<li class=''>";
                        }?>
                    <a class="" href="<?php echo base_url() . 'Dashboard/report_an_expense_list'?> " onclick="remove_settings_menu()">
                       <i class="fa fa-files-o" ></i>
                        <span><b>Report an Expense</b></span>
                    </a>
                </li>
               
                
                <?php } 
               ?>


            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->

<script>
    var controller = 'Dashboard';
    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function?>';

    function remove_settings_menu() {
        $.ajax({
            'url': base_url + controller + '/remove_settings_menu',
            'type': 'POST', //the way you want to send data to your URL
            'dataType': "json",
        });
    }

    function settings_menu() {
        $.ajax({
            'url': base_url + controller + '/settings_menu',
            'type': 'POST', //the way you want to send data to your URL
            'dataType': "json",
        });
    }
</script>