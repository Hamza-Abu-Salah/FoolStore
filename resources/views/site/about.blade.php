@extends('site.layout')

@push('style')

@endpush
@section('content')
<div class="content content-page" style="margin-bottom: 0">
    <header
      class="masthead"
      style="background-image: url('{{ asset('front/assets/img/blogs.png') }}')"
    >
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading text-center"></div>
          </div>
        </div>
      </div>
      <div class="imag">
        <img src="{{ asset('front/assets/img/image.png') }}" alt="" class="imag" />
        <h2 class="imag-h">{{__('messages.platform')}}{{__('messages.app_name')}}</h2>
    </div>
    </header>


    <main>
        <div class="container">
            <p style="font-size: 22px" id="">
                {{__('messages.app_name')}}
                {{__('messages.platform_info')}}
              <span style="color: #00bed6">Gallery App</span>   {{__('messages.or')}}
              <span style="color: #00bed6">Play Google</span>  {{__('messages.or')}} {{__('messages.store')}}
              <span style="color: #00bed6">AppleStore</span>

              {{__('messages.platform_info_2')}}
            </p>

          <div style="margin-top: 109px; margin-bottom: 40px">
            <h3 style="font-size: 22px"> {{__('messages.used')}}</h3>
                <p style="font-size: 20px">
                  {{__('messages.used_info')}}
                </p>
          </div>
          <div class="row" style="">
            <div class="col-lg-4">
              <img
                src="{{ asset('front/assets/img/about-serve%201.png') }}"
                width="387"
                height="293"
                alt=""
              />
              <button
                class="btn btn-primary btn-block btn-lg login-btn btn-ma btn-m"
                type="submit"
              >
              <a href="{{route('work_in_twenty')}}">

                {{__('messages.work_in_twnty2')}}
              </a>
              </button>
            </div>
            <div class="col-lg-7 pt-4 pt-lg-0" style="margin: 0 13px 0 28px;">
              <div class="d-flex" style="margin-bottom: 61px">
                <div>
                  <img
                    src="{{ asset('front/assets/img/iphone.png') }}"
                    width="48"
                    height="54"
                    alt=""
                  />
                </div>
                <div style="    margin: 0 20px;">
                    <h5 style="color: #00bed6; font-size: 20px">
                        {{__('messages.used_1')}}
                    </h5>
                    <p style="font-size: 18px">
                        {{__('messages.used_1_info')}}
                    </p>
                </div>
              </div>
              <div class="d-flex" style="margin-bottom: 61px">
                <div>
                  <img
                    src="{{ asset('front/assets/img/mm.png') }}"
                    width="48"
                    height="54"
                    alt=""
                  />
                </div>
                <div style="    margin: 0 20px;">
                    <h5 style="color: #00bed6; font-size: 20px">
                        {{__('messages.used_2')}}
                    </h5>
                    <p style="font-size: 18px">
                        {{__('messages.used_2_info')}}
                    </p>
                </div>
              </div>
              <div class="d-flex">
                <div>
                  <img
                    src="{{ asset('front/assets/img/mmm.png') }}"
                    width="48"
                    height="54"
                    alt=""
                  />
                </div>
                <div style="    margin: 0 20px;">
                    <h5 style="color: #00bed6; font-size: 20px">
                        {{__('messages.used_3')}}
                    </h5>
                    <p style="font-size: 18px">
                        {{__('messages.used_3_info')}}
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
  </div>
@endsection
