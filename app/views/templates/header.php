<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Portal Kaltim</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicons/favicon.png');?>"> -->


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==">
    <link href="<?php echo base_url('assets/css/theme.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/vendors/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/landing.css'); ?>" rel="stylesheet">
</head>


<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <nav class="navbar navbar-light sticky-top navbar-default" data-navbar-darken-on-scroll="900">
    <div class="container pt-2"><a class="navbar-brand" href="index.html"> <img id="logobps" src="assets/img/gallery/LogoBPS.png" alt="..." /></a><p>BPS Provinsi Kalimantan Timur</p>
        <div class="navbar-nav ms-auto">
            <!-- <button class="btn btn-secondary">Aplikasi BPS Kaltim</button> -->
            <ul class="navbar-nav ml-auto navbar-right">
                <!-- <li class="navbar-nav nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>" style="color:#ffffff">HOME</a>
                </li> -->
                <li class="navbar-nav nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>#aplikasi" style="color:#ffffff">Aplikasi BPS Kaltim</a>
                </li>
            </ul>    
        </div>
    </div>
    <!-- <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Right</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul> -->
    </nav>


<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $(window).scroll(function(){
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
    });
</script>   
    