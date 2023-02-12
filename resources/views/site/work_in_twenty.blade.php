@extends('site.layout')
@section('content')
    <div class="content wo_4"
        style="background: linear-gradient(90deg,#c6f4f4 0%,#f5fffe 26.81%,#ffffff 54.58%,#d8f4f4 99.86%);padding: 0;padding-bottom: 259px;">
        <header class="masthead" style="background-image: url('{{ asset('front/assets/img/Img.png') }}')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="site-heading " style="text-align: start;">
                            <h1>  {{__('messages.work_in_twnty2')}} </h1>
                            <span class="subheading"> {{__('messages.work_in_twnty2_info')}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="row wo_2" style="margin-bottom: 128px">
                    <div class="col-lg-6 wo_6">
                        <img src="{{ asset('front/assets/img/Frame%20(2).png') }}" width="346" height="335" alt="" />
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" style="direction: rtl">
                        <div class="d-flex d-flex-p" style="margin-bottom: 61px; padding: 0px 78px">
                            <div class="wo_1" style="margin-right: 20px">
                                <h5 style="font-size: 20px; font-weight: 700;">  {{__('messages.partner')}}<span style="color: #00BED6;">{{__('messages.app_name')}} </span></h5>
                                <p  style="font-size: 18px;">
                                 {{__('messages.partner_info')}}
                                </p>
                                <button id="work_btn" class="btn btn-primary btn-block btn-lg login-btn"
                                    style="
                background: linear-gradient(
                  97.33deg,
                  #56dde5 -23.32%,
                  #00bed6 132.47%
                );
                font-size: 18px !important;
              "
                                    type="submit">
                                    <a href="{{route('register_store')}}">{{__('messages.register_app')}} </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row wo_3" style="margin-bottom: 128px">
                    <div class="col-lg-6 pt-4 pt-lg-0" style="direction: rtl">
                        <div class="d-flex d-flex-p" style="margin-bottom: 61px; padding: 0px 78px">
                            <div style="margin-right: 20px">
                                <h5 style="font-size: 20px; font-weight: 700;">  {{__('messages.client')}}<span style="color: #00BED6;">{{__('messages.app_name')}} </span></h5>
                        <p  style="font-size: 18px;">
                            {{__('messages.clientinfo')}}
                        </p>
                                <button id="work_btn" class="btn btn-primary btn-block btn-lg login-btn"
                                    style="
                background: linear-gradient(
                  97.33deg,
                  #56dde5 -23.32%,
                  #00bed6 132.47%
                );
                font-size: 18px !important;
              "
                                    type="submit">
                                    {{__('messages.load_app')}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('front/assets/img/Frame%20(3).png') }}" width="346" height="335" alt="" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card flex-fill" style="border: 0 !important; background: 0">
                        <div
                            style="
            margin: auto;
            background: #f1feff;
            border-radius: 50%;
            width: 264px;
            height: 264px;
          ">
                            <img id="images" alt="Card Image" src="{{ asset('front/assets/img/business-requirements%201.png') }}"
                                width="181" height="132" class="images card-img-top"
                                style="
              width: 182px;
              margin-right: 48px;
              height: 133px;
              margin-top: 60px;
            " />
                        </div>
                        <div class="card-header" style="border: 0 !important; background: 0">
                            <h5 class="card-title mb-0 text-center" style="color: #00bed6; font-size: 18px">
                                {{__('messages.what_is_requeired')}}</h5>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center" style="font-size: 16px; font-weight: 600; padding: 0px 75px">
                                {{__('messages.what_is_requeired_info')}}</p>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card flex-fill" style="border: 0 !important; background: 0">
                        <div
                            style="
            margin: auto;
            background: #f1feff;
            border-radius: 50%;
            width: 264px;
            height: 264px;
          ">
                            <img id="images" alt="Card Image" src="{{ asset('front/assets/img/business-cancelation%201.png') }}"
                                width="181" height="132" class="images card-img-top"
                                style="
              width: 182px;
              margin-right: 48px;
              height: 133px;
              margin-top: 60px;
            " />
                        </div>
                        <div class="card-header" style="border: 0 !important; background: 0">
                            <h5 class="card-title mb-0 text-center" style="color:#00BED6 ; font-size: 18px;">
                                {{__('messages.cancellation')}}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center" style="font-size: 16px; font-weight: 600; padding: 0px 76px">
                                {{__('messages.cancellation_info')}}                        </p>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card flex-fill" style="border: 0 !important; background: 0">
                        <div
                            style="
            margin: auto;
            background: #f1feff;
            border-radius: 50%;
            width: 264px;
            height: 264px;
          ">
                            <img id="images" alt="Card Image" src="{{ asset('front/assets/img/business-support%201.png') }}"
                                width="181" height="132" class="images card-img-top"
                                style="
              width: 182px;
              margin-right: 48px;
              height: 133px;
              margin-top: 60px;
            " />
                        </div>
                        <div class="card-header" style="border: 0 !important; background: 0">
                            <h5 class="card-title mb-0 text-center" style="color: #00bed6; font-size: 18px">
                                {{__('messages.support')}}
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center" style="font-size: 16px; font-weight: 600; padding: 0px 80px">
                                {{__('messages.support_info')}}                    </p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
