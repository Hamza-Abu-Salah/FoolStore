<meta charset="utf-8" />
<title>الرئيسية</title>
@php
    $rtl = app()->getLocale() === 'ar' ? '_rtl' : '';
@endphp


<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

<!-- Favicons -->
<link href="{{ asset('front/assets/img/favicon.png') }}" rel="icon" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('front/assets/plugins/bootstrap-rtl/css/bootstrap.min.css') }}" />
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('front/assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('front/assets/plugins/fontawesome/css/all.min.css') }}" />

<!-- Main CSS -->
<!-- Swiper CSS -->



<link rel="stylesheet" href="{{ asset('front/assets/css/swiper-bundle.min.css') }}" />
<!-- CSS -->
<link rel="stylesheet" href="{{ asset('front/assets/css/style1.css') }}" />
<link href="front/assets/css/style{{$rtl}}.css" rel="stylesheet" type="text/css"/>

<style>
    .main-menu-wrapper {
        z-index: 999;
    }

    .sidebar-overlay {
        z-index: 0;
    }

    .fix-div-1 {
        margin-right: 20px;
    }
</style>
<style>
    .menu-logo {
        display: none;
    }
    .menu-header li > a {

        color: #fff !important ;
    }

    #menu_close {
        color: #000 !important;
    }
    .main-menu-wrapper {
        z-index: 999;
    }

    .sidebar-overlay {
        z-index: 0;
    }

    .fix-div-1 {
        margin-right: 20px;
    }
    .header-navbar-rht {
        margin-right: 0 !important;
    }
    .logo {
        width: 35px !important;
    }
    .btn-group {
        /*margin-left: 5px !important;*/
        margin-left: 19px !important ;
        
    }
    #btn_trust {
    font-size: small !important;
    width: 150px  !important;
    margin-left: 5px;
  }
  label {
    font-size: 12px;
  }
  .cards {
    width: 784px;
    height: 1050px;
    margin-top: -400px;
    margin-right: 550px;
    background: #fff;
    z-index: 1;
  }
  header.masthead .page-heading h1, header.masthead .site-heading h1 {
    font-size: 35px;
    color: white;
  }
  header.masthead .page-heading .subheading, header.masthead .site-heading .subheading {
    font-size: 18px;
    font-weight: 300;
    line-height: 1.1;
    display: block;
    margin: 10px 0 0;
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }
  .navbar-header .header-navbar-rht {
    display: none !important;
  }
  @media(max-width:600px){
    .menu-header li  {

        color: #fff !important ;
    }
  .but_m{
        display: none !important;
    }
    .bage {
    margin-top: 10% !important;
  }
  .card-body {
        width: 100%;
        padding: 0 !important;
    }
    .icon-box .icon {
        width: 100%;
    }

    .container .mt-5 {
        margin-bottom: 70px !important;
    }
    #icon_box {
        width: 100% !important;
    }
    #icon_txt{
        text-align: center;
    }
    .text-center .title.text-center {
        margin-right: 0 !important;
    }

  }
  .mobile_but_m{
    display: n;
  }
  @media(min-width:768px)and (max-width:1024px) {

    .menu-header li  {

        color: #fff !important ;
    }
  .cards {

       width: 100%;
        height: 600px ;
    }
    .card-body {
        width: 100%;
        padding: 0 !important;
    }
    .icon-box .icon {
        width: 100%;
    }

    .container .mt-5 {
        margin-bottom: 70px !important;
    }
    #icon_box {
        width: 100% !important;
    }
    #icon_txt{
        text-align: center;
    }
    .text-center .title.text-center {
        margin-right: 0 !important;
    }
    .but_m {
        display: none;
    }
    .header-navbar-rht {
        display: none;
    }
    .navbar-header .header-navbar-rht {
    display: block !important;
  }
    .navbar-header {
    width: 100%;
    direction: rtl !important;
    display: flex;
    justify-content: space-between !important;
  }
  .ri_1 {
    font-size: 11px;
  }

  }
  </style>
