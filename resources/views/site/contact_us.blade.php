<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from twnty2.co/contact_us by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 13:23:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
<title>الرئيسية</title>
@php
    $rtl = app()->getLocale() === 'ar' ? '_rtl' : '';
@endphp


<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

<!-- Favicons -->
<link href="front/assets/img/favicon.png" rel="icon" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="front/assets/plugins/bootstrap-rtl/css/bootstrap.min.css" />
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="front/assets/plugins/fontawesome/css/fontawesome.min.css" />
<link rel="stylesheet" href="front/assets/plugins/fontawesome/css/all.min.css" />
<!-- Main CSS -->
<!-- Swiper CSS -->



<link rel="stylesheet" href="front/assets/css/swiper-bundle.min.css" />
<!-- CSS -->
<link rel="stylesheet" href="front/assets/css/style1.css" />

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
        ul li a {
            color: #fff !important;
        }
    </style>

  </head>
  <body class="account-page" >
    <!-- Main Wrapper -->
    <div class="main-wrapper">
      <!-- Header -->
     @include('site.include.header')
      <!-- /Header -->

      <!-- Page Content -->
        <!-- Page Header -->
    <header class="masthead"
                    style="
                background-image: url('{{ asset('front/assets/img/locations.png') }}');
                padding-top: 10%;
            ">
        <div class="overlay" style="background: rgba(0,0,0,0.5)"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <div class="site-heading" style="">
                        <h1> {{ __('messages.contact_us') }} </h1>
                        <span class="subheading">
                            {{ __('messages.contact_page') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class=" cards1 cards5  cards" style="">
        <div class="row">
            <div class="col-md-9">
                <div class="card box cards3" style="width: 754px;    z-index: 1 !important;" ;>
                    <div class="card-header text-center"></div>
                    <div class="card-body" style="background: #fff;">
                        @if (session('success'))
                            <div class="badge badge-success" style="font-size: 24px;   height: 41px;">
                                <span class="badge badge-success" style="float: right;">
                                    {{ session('success') }}
                                </span>
                            </div>
                        @endif
                        <form action="{{ route('contactus') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('messages.name') }}</label>
                                        <input type="text" class="form-control" name="name"
                                            style="background: #f9fafb" />
                                    </div>
                                    <div class="form-group">
                                        <label> {{ __('messages.email') }}</label>
                                        <input type="email" name="email" class="form-control"
                                            style="background: #f9fafb" />
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('messages.phone') }} </label>
                                        <input type="text" name="phone" class="form-control"
                                            style="background: #f9fafb" />
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('newsite/assets/img/img4.png') }}" width="288" height="305"
                                        alt="" />
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> {{ __('messages.title') }}</label>
                                        <input type="text" name="message_title" class="form-control"
                                            style="background: #f9fafb" />
                                    </div>
                                    <label> {{ __('messages.message') }} </label>
                                    <div class="form-group"
                                        style="border: 0.7px solid #21B5B5 ;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15) ;border-radius: 5px ;">
                                        <input name="message"
                                            style="background: #F9FAFB ;    width: 100%; height: 136px; margin-bottom: 0; border: 0;"
                                            class=" form-group" />
                                    </div>
                                </div>
                            </div>


                            <div>

                                <button type="submit" class="btn"
                                    style="
                            background: linear-gradient(
                                79.36deg,
                                #3cd6d5 -15.57%,
                                #19acac 125.3%
                            );
                            color: white;
                            width: 115px;
                            height: 45px;
                            font-size: 20px;
                            ">
                                    {{ __('messages.send') }}
                                </button>
                                <button type="reset" class="btn"
                                    style="
                                background: linear-gradient(
                                    79.36deg,
                                    #3cd6d5 -15.57%,
                                    #19acac 125.3%
                                );
                                color: white;
                                width: 115px;
                                height: 45px;
                                font-size: 20px;
                                ">
                                    {{ __('messages.close') }}
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="location-m1 container card-loc ">

        <div class="col-md-6 location" style="max-width: 100% !important;">
            <h2>{{ __('messages.our_offices') }}</h2>
            <!-- <i class="fa-solid fa-location-dot"></i> -->
            <div>
                <p class="mb-0" style="font-size: 20px">
                    <i class="fa-solid fa-location-dot" style="color: #00f085"></i>

                    <strong> {{ __('messages.our_offices_main') }}</strong>
                </p>
                <span style="font-size: 18px; margin-right: 17px">

                    {{ __('messages.our_offices_main_info') }}
                </span>
            </div>
            <div class="co_1" style="margin-bottom: 300px">
                <p class="mb-0" style="font-size: 20px">
                    <i class="fa-solid fa-location-dot" style="color: #00f085"></i>
                {{ __('messages.our_offices_eygpt') }}
                </p>
                <span style="font-size: 16px; margin-right: 17px">

                    {{ __('messages.our_offices_eygpt_info') }}
                </span>
            </div>
            <h2 style="margin-right: 45px">{{ __('messages.find_us') }}</h2>
            <div class="social-icon" style="margin-bottom: 162px">
                <ul class="nav footer-navbar-rht" style="margin-right: -50px">
                    <div class="social-icon">
                        <ul>
                            <li style="background: #3cd6d5">
                                <a href="https://www.facebook.com/apptwnty2" target="_blank"
                                  ><i class="fab fa-facebook-f"></i>
                                </a>
                              </li>
                              <li style="background: #3cd6d5">
                                <a href="https://www.snapchat.com/add/apptwnty2" target="_blank"
                                  ><i class="fab fa-snapchat"></i>
                                </a>
                              </li>
                              <li style="background: #3cd6d5">
                                <a href="https://api.whatsapp.com/send?phone=966547011016" target="_blank"
                                  ><i class="fab fa-whatsapp"></i
                                ></a>
                              </li>
                              <li style="background: #3cd6d5">
                                <a href="https://www.instagram.com/apptwnty2" target="_blank"
                                  ><i class="fab fa-instagram"></i
                                ></a>
                              </li>
                              <li style="background: #3cd6d5">
                                <a href="https://www.twitter.com/apptwnty2" target="_blank"
                                  ><i class="fab fa-twitter"></i
                                ></a>
                              </li>
                              <li style="background: #3cd6d5">

                                <a href="https://www.linkedin.com/in/apptwnty2" target="_blank"
                                  ><i class="fab fa-linkedin-in"></i
                                ></a>

                              </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </div>


      <!-- /Page Content -->
      <!-- Footer -->
 @include('site.include.footer')
      <!-- /Footer -->
    </div>
    <!-- /Main Wrapper -->

   <!-- jQuery -->
@include('site.include.script')
  </body>

<!-- Mirrored from twnty2.co/contact_us by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 13:23:21 GMT -->
</html>
