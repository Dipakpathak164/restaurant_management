<!doctype html>
<html lang="en">

<head>
    <title>Get Breadcrumbs Restaurant Analytics - Follow the data!</title>
    <!--<link rel="shortcut icon" href="<?php /*echo IMAGE_PATH*/ ?>happynotes_logo.png">-->

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo IMAGE_PATH ?>White-Logo2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo IMAGE_PATH ?>White-Logo2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo IMAGE_PATH ?>White-Logo2.png">
    <link rel="manifest" href="<?php echo IMAGE_PATH ?>site.webmanifest">
    <link rel="mask-icon" href="<?php echo IMAGE_PATH ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <!--[if IE 9]>
    <link href="<?php echo CSS_PATH . 'style-ie' . CSS_EXT ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    
     <!-- -----fonts----- -->
   <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        p,
        textarea,
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        td,
        span,
        a,
        label,
        button,
        input,
        div {
           font-family: 'Montserrat', sans-serif;
        }
        body{
            /* background: linear-gradient(to right, rgba(58, 58, 58, 0.7), rgba(58, 58, 58, 0.7)); */
            background-color: #F8F8F8;
            height:100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bg-formLogin {
            height: 95px;
            /* border-radius: 4px; */
            /* box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.08); */
            /* background-color: #ffffff; */
        }

        .btn-signIn {
            width: 100%;
            height: 50px;
            border-radius: 5px;
            background-color: #007bff;
            font-weight: 500;
            font-size: 14px;
        }

        .login-height {
            /* height: 100vh; */
            /* width: 100vw; */
        }
       .modal_left {
           background: transparent linear-gradient(250deg, #851417 0%, #dd1f27 100%) 0% 0% no-repeat padding-box !important;
           display: flex;
           flex-direction: column;
           justify-content: space-between;
           align-items: center;
           padding-left: 28px;
           padding-right: 28px;
           padding-top: 50px;
           position: relative;
    }
   .clip_o {
           position: absolute;
           bottom: 0;
           right: 0;
            width: 100%;
    }
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control-placeholder {
            position: absolute;
            top: 24px;
            padding: 7px 0 0 13px;
            transition: all 200ms;
            opacity: 0.5;
            font-size: 18px;
        }

        .form-control:focus+.form-control-placeholder,
        .form-control:valid+.form-control-placeholder {
            font-size: 84%;
            transform: translate3d(0, -100%, 0);
            opacity: 1;
            padding-top: 0;
            padding-left: 0;
        }

        input#EmployeeId,
        input#exampleInputPassword1 {
            background-color: #F8F8F8 !important;
            border-radius: 10px !important;
            border: 1px solid #F8F8F8 !important;
            height: calc(1.5em + .75rem + 12px);
        }

        #showpassword {
            /* background-color: #d8dbe8; */
            color: #030229 !important;
        }

        .wrapper:after {
            content: "";
            background-color: #eff2ff;
            /*position: absolute;
            width: 3px;
            height: 100vh;
            top: -25%;
            left: 95%;*/
            position: fixed;
            width: 3px;
            height: 100vh;
            top: 0;
            display: block;
            left: 57%;
        }

        .container-fluid {
            overflow-x: hidden;
        }
        .footer_container{
            width:90%;
        }

      
        .input-group-text {
            background-color: #eff2ff;
            border: none;
            cursor: pointer;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .modal-header {
            background-color: #007bff;
            padding: 0;
            height: 45px;
        }

        .modal-header .close {
            padding: 10px;
            margin: 0;
            opacity: 1;
        }

        .modal-content {
            border: none;
        }

        #onForgot,
        .remember-btn {
            font-size: 14px;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            color: #7047EE;
            font-weight: 500;
        }

        .remember-btn {
            position: relative;
            left: 22px;
            cursor: pointer;
        }

        .remember-btn input {
            margin-top: 3px;
        }

        #showpassword {
            font-size: 12px;
            font-weight: 900;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: 0.47px;
            color: #4a4a4a;
        }

        #onForgot:hover {
            text-decoration: none;
        }

        .bg-formLogin label {
            /* opacity: 0.6; */
            font-size: 15 px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #000;
        }

        .sign_in__text {
            font-size: 23px;
            font-weight: 900;
            font-style: normal;
            font-stretch: normal;
            line-height: 1.04;
            letter-spacing: normal;
            color: #2a2c35;
        }

        /* .btn.btn-signIn:hover,
        .btn.btn-success:hover {
            background: #007BB9 radial-gradient(circle, transparent 1%, #007BB9 1%) center/15000% !important;
        } */

        #demo .carousel-indicators li {
            width: 12px;
            height: 12px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 50%;
        }

        #demo .carousel-indicators .active {
            background-color: #536ae2;
            border-radius: 50%;
        }

        .form-login1 {
            width: 90%;
            margin: auto;
        }

        .login-form_box,
        #demo {
            /* position: relative;
            top: 50%;
            transform: translateY(-50%); */
        }

        input#EmployeeId:focus,
        input#exampleInputPassword1:focus {
            box-shadow: none;
        }

        .loginCarousel-Img {
            width: 30%;
            height: auto;
            margin: auto;
        }

        .img-div {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            -moz-flex-direction: row;
            -ms-flex-direction: row;
            -o-flex-direction: row;
            flex-direction: row;
        }
        a#onForgot {
    margin-top: 0px !important;
}

.col-md-6.modal_left {
    border-radius: 0px 20px 0px 20px;
}
.my-3rem{
    margin-top: 3rem;
    margin-bottom: 3rem;

}
        @media (max-width: 1024px) {
            .form-login1 {
                width: 90%;
            }
        }

        @media (max-width: 991px) {
            .form-login1 {
                width: 100%;
            }

            /*login*/
            .wrapper:after {
                left: 48%;
            }

            /*login*/
        }

        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) {
            .loginCarousel-Img {
                width: 60% !important;
                height: 86% !important;
            }

            .wrapper .carousel-indicators {
                bottom: -25px;
            }

            .wrapper:after {
                left: 48%;
            }
        }

        @media (max-width: 767px) {
            .form-login1 {
                width: 90%;
            }

            .wrapper:after {
                width: 0;
            }
            .login-height {
            height: 100vh;
            width: 100vw;
        }
        form.form-login1 p b {
    font-size: 12px;
}
.login-overflow-ie.my-3rem{
    margin-top: 0px
    }
        }

        @media (max-width:480px) {

            /*.loginCarousel-Img{
                width: 70px;
                height: 70px;
            }*/
            .chola-logo {
                width: 125px;
                height: 80px;
            }

            .cumi-logo {
                width: 100px;
                height: 90px;
            }

            .dbg-logo {
                width: 145px;
                height: 85px;
            }

            .TI-logo {
                width: 135px;
                height: 105px;
            }

            .wrapper:after {
                display: none;
            }

            .loginCarousel-item {
                padding: 0 !important;
                margin-bottom: 30px;
            }

            .login-height {
                width: auto !important;
            }

            .logo-login {
                /*height: 96px;
                width: 137px;*/
                margin-top: 20px;
            }

            .form-login1 {
                width: 85% !important;
                margin-left: auto;
                margin-right: auto;
                display: block;
                margin-top: 20px;
            }

            .login-form-padding {
                padding: 0 !important;
            }
        }

        @media screen and (-ms-high-contrast: active),
        (-ms-high-contrast: none) {
            .login-overflow-ie {
                overflow: hidden;
            }

            .show-ie-right {
                right: 0;
                top: 0;
                position: absolute;
            }

            .loginCarousel-Img {
                height: auto !important;
                min-height: 10px;
                max-height: 80px;
            }

            .loginCarousel-Img.two {
                width: auto !important;
            }

            .loginCarousel-Img.six {
                width: auto !important;
            }

            .img-div {
                align-items: center;
                margin-bottom: 10px;
            }
        }

        .cmp-img {
            width: auto;
            max-width: 200px;
            max-height: 100px;
        }
        a.btnregister {
    background-color: #ff2b3c;
    color: #fff !important;
    padding: 6px 10px;
    border-radius: 5px;
    text-decoration: none !important;
    font-weight: 600;
    font-size: 15px
}
    .link_text{
    color: #007bff;
    }
    .link_text:hover{
        text-decoration: none;
    }
    </style>

    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            /*margin-left: -125px;*/
            background-color: #3e956a;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 9999;
            right: 1%;
            top: 10%;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 10%;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 10%;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                top: 10%;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                top: 10%;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }

        #snackbar_error {
            visibility: hidden;
            min-width: 250px;
            /*margin-left: -125px;*/
            background-color: #FF5733;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 9999;
            right: 1%;
            top: 10%;
            font-size: 17px;
        }

        #snackbar_error.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        .loginCard {
            background-color: #fff;
            padding: 2.2rem;
            border-radius: 15px;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-control.bg-input-login {
            border: none !important;
            background-color: #faf9fd !important;
            padding: 6px 12px;
            height: 48px;
            border-radius: 2px;
            font-size: 16px;
            line-height: 1.42857143;
            color: #555;
            background-image: none;
        }

        .remember-btn,
        .forgotpwd a span {
            color: #7047EE;
        }

        .bgimg {
            background-size: cover;
            background-repeat: no-repeat;
                position: absolute;
           top: 50%;
           left: 50%;
          -webkit-transform: translate(-50%, -50%);
           -ms-transform: translate(-50%, -50%);
           transform: translate(-50%, -50%);
        }
        /* .sign_in__text:before {
    position: absolute;
    top: 30%;
    overflow: hidden;
    width: 25%;
    height: 1px;
    content: '\a0';
    background-color: rgba(0,0,0,.3);
    margin-left: -26%;
}
.sign_in__text:after {
    position: absolute;
    top: 30%;
    overflow: hidden;
    width: 25%;
    height: 1px;
    content: '\a0';
    background-color: rgba(0,0,0,.3);
    margin-left: 1%;
} */
.alert.alert-danger.alert-square.alert-dismissable {
    margin-bottom: 0px !important;
    position: absolute;
    width: 100%;
    z-index: 5;
    border-radius: unset;
    top:0;
}
    </style>

    <script>
        function show_snackbar(e) {
            var x = document.getElementById("snackbar");
            x.className = "show";
            $('#snackbar').html(e);
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        function show_snackbar_error(e) {
            var x = document.getElementById("snackbar_error");
            x.className = "show";
            $('#snackbar_error').html(e);
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>
</head>

<body>
    <div id="snackbar"></div>
    <div id="snackbar_error"></div>
    <?php
    $success_message = $this->session->flashdata('success_message');
    $error_message = $this->session->flashdata('error_message');

    if (isset($success_message)) {

        echo " <div class=\"alert alert-success alert-square alert-dismissable\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\"><i class=\"fa fa-times\"></i></button>
        <strong>Success!</strong> $success_message
    </div>";
    }

    if (isset($error_message)) {

        echo " <div class=\"alert alert-danger alert-square alert-dismissable\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\"><i class=\"fa fa-times\"></i></button>
        <strong>Warning!</strong> $error_message
        </div>";
    }

    unset($_SESSION['success_message']);
    unset($_SESSION['error_message']);
    ?>
    <div class="container px-0 login-overflow-ie my-3rem">
       <div class="row">
        <!-- <div class="col-md-12 m-auto"> -->

            <div class="col-md-6 col-lg-6  login-form-padding mx-auto">
                <div class="login-form_box loginCard">

                    <div class="text-center">

                    </div>

                    <?php

                    ?>
                    <?php echo form_open('Auth/check_login', array('class' => "form-login1")) ?>
                     <img src="<?php echo IMAGE_PATH?>Black-Logo.webp" alt="Black-Logo" width="200">
                    <h4 class="sign_in__text mb-3 mt-3">Log in </h4>
                    <div>
                     
                    </div>
                    <div class="form-group bg-formLogin py-2 mb-1">
                        <label for="EmployeeId">Email Address </label>
                        <input type="text" class="form-control bg-input-login" id="EmployeeId" placeholder="example@gmail.com" name="email" autocomplete="off" required>
                    </div>
                    <div class="form-group bg-formLogin py-2 mb-1">
                        <label for="exampleInputPassword1">Password</label>
                        <div class="input-group mb-3 input-group">
                            <input type="password" name="password" class="form-control w-ie-100 bg-input-login" placeholder="Password" id="exampleInputPassword1" autocomplete="off" required>
                            <span class="input-group-text" id="showpassword"><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <button type="submit" class="btn btn-signIn text-light mb-4">Log in</button>
                    </div>
                    <div class="form-check mt-1">
                        <div class="row">
                            <div class="col-12 forgotpwd text-center">
                                <a href="javascript:void(0);" class="" id="onForgot"><span data-toggle="modal" data-target="#forgot">Forgot Password?</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="<?php echo base_url()?>breadcrumbs-onboarding-questionnarie" class="link_text">
                        Onboarding Questionnarie <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <?php echo form_close() ?>

                    <!-- <div class="col-12 text-center">
                            <img src="<?php echo IMAGE_PATH ?>website_logo.png" width="180px" height="auto" class="logo-login">
                     </div> -->
                </div>
            </div>
        <!-- </div>
       </div> -->
      </div>
    </div>


    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgot" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="forgotForm">
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-light mt-2 pl-2">Forgot Password ?</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Enter your Email Id  below to reset your password.</p>
                        <input required type="text" name="email" id="forgot-email" placeholder="Email Id" autocomplete="off" class="forget_password_email form-control placeholder-no-fix">
                    </div>
                    <div class="modal-footer">
                        <span class="forgot_error" style="color: red"></span>
                        <b class="error_forget_email" style="color: red"></b>
                        <button type="submit" class="btn btn-success forgot_button font-weight-bold" style="border: none;color: #fff;background: #007bff;border-radius: 0; border-color:#007bff">
                            Submit <span class="forgot_fa_spin_icon"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>
<script>
    var controller = 'Auth';
    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function 
                    ?>';

document.getElementById("showpassword").addEventListener("click", showPasswords);

function showPasswords() {
    var passwordInput = document.getElementById("exampleInputPassword1");
    var showIcon = document.getElementById("showpassword").querySelector("i");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showIcon.classList.remove("fa-eye");
        showIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        showIcon.classList.remove("fa-eye-slash");
        showIcon.classList.add("fa-eye");
    }
}


    /*Login floating label solved*/
    /*$(document).ready(function() {
        setTimeout(function () {
            this._toggleClass(this._isWebkitAutofilled());
        }.bind(this), 2000);
    });*/

    /*Forgot password email*/
    $('#onForgot').click(function() {
        var userEmail = $('#EmployeeId').val();
        $('#forgot-email').val(userEmail);
    })

    function forgot_get_email() {

        var email = $('.login_email').val();
        $('.forget_password_email').val(email);
    }

    function activate_get_email() {

        var email = $('.login_email').val();
        $('.active_email').val(email);
    }
    /*Forgot password*/
    $("#forgotForm").on('submit', function(e) {
        $('.forgot_error').html('').fadeIn('');
        $('.forgot_fa_spin_icon').html(' <div class="spinner-border spinner-border-sm"></div>\n');
        $(".forgot_button").attr("disabled", true);
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: base_url + controller + '/forgotPassword',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            'dataType': "json",
            success: function(data) {
                if (data.status == 200) {
                    $('.forgot_fa_spin_icon').html('');
                    $(".forgot_button").attr("disabled", false);
                    show_snackbar(data.data);
                    // setTimeout(function () {
                    //     location.reload();
                    // }, 500);
                } else {
                    $('.forgot_error').html(data.data).delay(3200).fadeOut(300);
                    $('.forgot_fa_spin_icon').html('');
                    $(".forgot_button").attr("disabled", false);
                }
            }
        });
    });
</script>

</html>
