@extends('site.layout')
@section('content')
<div class="content" style="padding: 0; background: white">
    <header class="masthead about" style="margin-bottom: 0">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-hero row" style="direction: ltr; padding-top: 6%">
                <div class="col-lg-6 col-md-10 box_m">
                    <div id="site-heading" class="hero site-heading text-dark" style="text-align: start">
                        <h1 class="text-dark" style="font-weight: 700">
                            {{ __('messages.intro') }}
                          </h1>
                          <span class="subheading text-center mt-3 mb-4">
                            {{ __('messages.intro_1') }}</span
                          >

                        <div class="social ">

                            <span class="subheading " style="margin-right: 10px">
                                <a href="#"> <img src="{{ asset('front/assets/img/802.png') }}"
                                        alt="" /></a>
                            </span>

                            <span class="subheading" style="margin-right: 10px">
                                <a href="#">
                                    <img src="{{ asset('front/assets/img/google-play.png') }}" alt="" /></a>
                            </span>
                            <span class="subheading" style="margin-right: 10px">
                                <a href="#"> <img src="{{ asset('front/assets/img/Gelley.png') }}"
                                        alt="" /></a>

                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 box_m">
                    <div class="hero" style="text-align: start">
                        <span class="subheading">
                            <img src="{{ asset('front/assets/img/H1%202%20(2).png') }}" class="hero"
                                style="width: 100%;" alt=""
                                style="position: relative; padding: 0" /></span>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-wrapper1">
        <div class="container">
            <div class="row" style="margin-bottom: 128px">
                <div class="col-lg-12 pt-4 pt-lg-0 text-center" style="">
                    <div class="pad d-flex padding se_2" style="margin-bottom: 61px; padding: 0px 288px">
                        <div class="seactain_2" style="margin-right: 20px">
                            <h5
                                style="
                                    font-size: 35px;
                                    margin-bottom: 37px;
                                    padding-top: 107px;
                                ">
                <span style="color: #00bed6"> {{ __('messages.about') }} </span>
            </h5>
                            <p style="font-size: 25px;margin-bottom: 39px; font-weight: 500;">
                                <span style="color: #00bed6">
                                </span> {{ __('messages.about_app') }}
                            </p>
                            <div class="text-center">
                                <button style="width: 210px;    margin: auto;"
                                    class="btn btn-primary btn-block btn-lg login-btn btn-blus"
                                    type="submit">
                                    <a style="color:#fff" href="{{ route('about') }}"> {{ __('messages.more_info') }}</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="services">
            <h2 class="text-center mb-4">{{ __('messages.services') }}</h2>
            <div class="row" style="direction: ltr">
                <div class="col-lg-6 se_3">
                    <img src="{{ asset('front/assets/img/Group-phone.png') }}" class="phone absolute" width="495"
                        height="675" alt="" />
                </div>
                <div class="phone-text col-lg-6 pt-4 pt-lg-0" style="direction: rtl">
                    <div class="d-flex" style="margin-bottom: 61px">
                        <div style="margin-right: 20px">
                            <h5 style="font-size: 20px; color: #26bcbc">
                                {{ __('messages.services_1') }}
                            </h5>
                            <p class="paeh" style="font-size: 18px">
                                {{ __('messages.services_1_detail') }}

                            </p>
                        </div>
                    </div>
                    <div class="d-flex" style="margin-bottom: 61px">
                        <div style="margin-right: 20px">
                            <h5 style="font-size: 20px; color: #26bcbc">
                                {{ __('messages.services_2') }}
                            </h5>
                            <p class="paeh" style="font-size: 18px">
                                {{ __('messages.services_2_detail') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex" style="margin-bottom: 61px">
                        <div style="margin-right: 20px">
                            <h5 style="font-size: 20px; color: #26bcbc">
                                {{ __('messages.services_3') }}
                            </h5>
                            <p class="paeh" style="font-size: 18px">
                                {{ __('messages.services_3_detail') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex" style="margin-bottom: 61px">
                        <div style="margin-right: 20px">
                            <h5 style="font-size: 20px; color: #26bcbc">
                                {{ __('messages.services_4') }}
                            </h5>
                            <p class="paeh" style="font-size: 18px">
                                {{ __('messages.services_4_detail') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="margin-right:0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-test">
                        <div class="container se_4">
                            <div class="pt-5 pb-4 dow_1">
                                <h4 class="test">{{ __('messages.loadapp') }} </h4>
                            </div>

                            <div class="d-flex se_5">





                                <div class="row">
                                    <div class="col-md-3" style="    margin: 9px;">
                                        <span class="subheading" style="margin-right: 10px">
                                            <a href="#"> <img src="{{ asset('front/assets/img/802.png') }}"
                                                    alt="" /></a>
                                        </span>

                                    </div>
                                    <div class="col-md-3" style="    margin: 9px;">
                                        <span class="subheading" style="margin-right: 10px">
                                            <a href="#">
                                                <img src="{{ asset('front/assets/img/Gelley.png') }}" alt="" /></a>

                                        </span>
                                    </div>
                                    <div class="col-md-3" style="    margin: 9px;">
                                        <span class="subheading" style="margin-right: 10px">
                                            <a href="#">
                                                <img src="{{ asset('front/assets/img/google-play.png') }}"
                                                    alt="" /></a>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4 mt-5"> {{ __('messages.what_defines') }}</h2>
        <section class="comp-section comp-cards">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card flex-fill" style="border: 0; border: 0; background: 0">
                        <img alt="Card Image img-card1" src="{{ asset('front/assets/img/Ellipse%20852%20(2).png') }}"
                            class="hand" class="card-img-top" />
                        <img src="{{ asset('front/assets/img/Group.png') }}" width="50" class="hand-img"
                            alt="" />
                        <div class="card-header" style="border: 0; background: 0">
                            <h5 class="card-title mb-0 text-center"
                                style="font-size: 20px; font-weight: 400; color: #24b9b9">
                                {{ __('messages.what_defines_1') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center" style="font-size: 20px; font-weight: 400">
                                {{ __('messages.what_defines_1_info') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card flex-fill" style="border: 0; border: 0; background: 0">
                        <img alt="Card Image img-card1" src="{{ asset('front/assets/img/Ellipse%20852%20(2).png') }}"
                            class="hand" class="card-img-top" />
                        <img src="{{ asset('front/assets/img/Group%20(1).png') }}" width="60" class="hand-img1"
                            alt="" />
                        <div class="card-header" style="border: 0; background: 0">
                            <h5 class="card-title mb-0 text-center"
                                style="font-size: 20px; font-weight: 400; color: #24b9b9">
                                {{ __('messages.what_defines_2') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center" style="font-size: 20px; font-weight: 400">
                                {{ __('messages.what_defines_2_info') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card flex-fill" style="border: 0; border: 0; background: 0">
                        <img alt="Card Image img-card1" src="{{ asset('front/assets/img/Ellipse%20852%20(2).png') }}"
                            class="hand card-img-top" />
                        <img src="{{ asset('front/assets/img/Group%20(2).png') }}" width="60" class="hand-img2"
                            alt="" />
                        <div class="card-header" style="border: 0; background: 0">
                            <h5 class="card-title mb-0 text-center"
                                style="font-size: 20px; font-weight: 400; color: #24b9b9">
                                {{ __('messages.what_defines_3') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center" style="font-size: 20px; font-weight: 400">
                                {{ __('messages.what_defines_3_info') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h2 class="text-center">{{ __('messages.how_to_work') }}</h2>
        <div class="card"
                                style="
                    background: linear-gradient(
                        90deg,
                        #c6f4f4 0%,
                        #f5fffe 26.81%,
                        #ffffff 54.58%,
                        #d8f4f4 99.86%
                    ) !important;
                    ">

            <div class="row">
                <div class="col-md-12">
                    <img style="width: 100%" src="{{ asset('front/assets/img/Youtube.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="slider" style="background-image: url('{{ asset('assets/img/background.png') }}')">
            <div class="slide-container swiper">
                <div class="mb-5 h2-slider text-center">
                    <h1 style="font-size: 36px; font-weight: 700" class="comment">{{ __('messages.role') }}</h1>
                </div>
                <div class="slider-sm slide-content">
                    <div class="card-wrapper swiper-wrapper">

                        @isset ($items[0])
                        <div class="card swiper-slide">
                        <div style="position: relative">
                          <img src="{{ asset('newsite/assets/img/Vector 11.png') }}" alt="" class="vector" />
                          <img class="slide1" style="position:absolute ;" src="{{ asset('newsite/assets/img/back2.png') }}" alt="" width="379" height="300" >

                        </div>
                        <div class="card-im1">
                          <img style="width: 80px; height: 80px; border-radius: 50%;" src="/{{$items[0]->avatar}}" alt="" />
                        </div>
                        <div class="card-im">
                          <h3> {{ ((app()->getLocale() === 'ar' ? $items[0]->name_ar:  $items[0]->name_en)) }}</h3>
                          <p style="font-weight: 400; padding:0px 15px">
                            <h3> {{ ((app()->getLocale() === 'ar' ? $items[0]->content_ar:  $items[0]->content_en)) }}</h3>

                          </p>
                        </div>
                      </div>
                        @endisset

                        @isset ($items[1])
                      <div class="card swiper-slide">
                        <div style="position: relative">
                            <img src="{{ asset('newsite/assets/img/Vector 11.png') }}" alt="" class="vector" />
                            <img class="slide1" style="position:absolute ;" src="{{ asset('newsite/assets/img/back2.png') }}" alt="" width="379" height="300" >

                          </div>
                        <div class="card-im1">
                          <img style="width: 80px; height: 80px; border-radius: 50%;" src="/{{$items[1]->avatar}}" alt=""  />
                        </div>
                        <div class="card-im">
                            <h3> {{ ((app()->getLocale() === 'ar' ? $items[1]->name_ar:  $items[1]->name_en)) }}</h3>
                            <p style="font-weight: 400; padding:0px 15px">
                              <h3> {{ ((app()->getLocale() === 'ar' ? $items[1]->content_ar:  $items[1]->content_en)) }}</h3>

                            </p>
                        </div>
                      </div>

                      @endisset
                      @isset ($items[2])
                      <div class="card swiper-slide">
                        <div style="position: relative">
                            <img src="{{ asset('newsite/assets/img/Vector 11.png') }}" alt="" class="vector" />
                            <img class="slide1" style="position:absolute ;" src="{{ asset('newsite/assets/img/back2.png') }}" alt="" width="379" height="300" >

                          </div>
                        <div class="card-ie1">
                          <img style="width: 80px; height: 80px; border-radius: 50%;" src="/{{$items[1]->avatar}}" alt="img" vector />
                        </div>
                        <div class="card-ie">
                            <h3> {{ ((app()->getLocale() === 'ar' ? $items[2]->name_ar:  $items[2]->name_en)) }}</h3>
                            <p style="font-weight: 400; padding:0px 15px">
                              <h3> {{ ((app()->getLocale() === 'ar' ? $items[2]->content_ar:  $items[2]->content_en)) }}</h3>

                            </p>
                        </div>
                      </div>

                      @endisset
                    </div>

                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                    <div class="swiper-pagination"></div>
                  </div>
            </div>
        </div>
    </main>
</div>
@endsection
