@extends('dashboard.layout')
@section('menu_18', 'active')
@section('content')
    <div class="page-wrapper" style="background:#E5E5E5 ; height: 150%;">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        الإعدادات</h3>
                </div>
            </div>
        </div>
        <div class="row " style="text-align: right;">
            <form action="/settings/set" method="post">
                @csrf
                <div class="content1 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title" style="color:#3CD6D5">الإعدادات </h5>
                        </div>
                        <div class="card-header">
                            <h5 class="card-title" style="color:#C4C4C4">WEBIT INFO </h5>
                        </div>
                        <div class="fix-withe6 card-body">
                            <form action="#">

                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">عنوان
                                        الشركة </label>
                                    <input value="{{ $item?->company_title }}" name="company_title" type="text"
                                           id="text" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">رقم هاتف
                                        للتواصل</label>
                                    <input value="{{ $item?->contact_number }}" name="contact_number" type="text"
                                           id="text" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">رقم الواتس
                                        للتواصل</label>
                                    <input value="{{ $item?->whatsapp_number }}" name="whatsapp_number" type="text"
                                           id="name" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">البريد
                                        الإلكتروني</label>
                                    <input value="{{ $item?->email }}" name="email" type="email" id="number"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4"> رقم تعريف
                                        الضريبي </label>
                                    <input value="{{ $item?->tax_number }}" name="tax_number" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">نسبة ضريبة القيمة
                                        المضافة </label>
                                    <input value="{{ $item?->vat_rate }}" name="vat_rate" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">غرامة
                                        الإلغاء</label>
                                    <input value="{{ $item?->cancel_value }}" name="cancel_value" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">الحد الأدنى
                                        للشحن </label>
                                    <input value="{{ $item?->min_shipping }}" name="min_shipping" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4"> الحد الأقصى
                                        للشحن </label>
                                    <input value="{{ $item?->max_shipping }}" name="max_shipping" type="text" id="email"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4"> رسوم
                                        التطبيق </label>
                                    <input value="{{ $item?->fee }}" name="fee" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <hr>
                                <h5 class="card-title" style="color:#C4C4C4">ANALYTICS INFO </h5>
                                <hr>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">Google
                                        Analytics </label>
                                    <input value="{{ $item?->google_analytics }}" name="google_analytics" type="text"
                                           id="text" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4"> Facebook
                                        Pixel </label>
                                    <input value="{{ $item?->facebook_pixel }}" name="facebook_pixel" type="text"
                                           id="email" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4"> Twitter
                                        Pixel </label>
                                    <input value="{{ $item?->twitter_pixel }}" name="twitter_pixel" type="text"
                                           id="text" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4"> SnapChat
                                        Pixel </label>
                                    <input value="{{ $item?->snapchat_pixel }}" name="snapchat_pixel" type="text"
                                           id="text" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4"> Tiktok
                                        Pixel </label>
                                    <input value="{{ $item?->tiktok_pixel }}" name="tiktok_pixel" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <hr>
                                <h5 class="card-title" style="color:#C4C4C4">SEO INFO </h5>
                                <hr>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">إسم الموقع</label>
                                    <input value="{{ $item?->site_name }}" name="site_name" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">وصف الموقع</label>
                                    <input value="{{ $item?->site_desc }}" name="site_desc" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">Site Keyword</label>
                                    <input value="{{ $item?->site_keywords }}" name="site_keywords" type="text"
                                           id="text" class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <div class="form-group">
                                    <label style="text-align:right;font-size: 16px; color: #C4C4C4">FD APP ID</label>
                                    <input value="{{ $item?->fdappid }}" name="fdappid" type="text" id="text"
                                           class="form-control"
                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                </div>
                                <hr>
                                <h5 class="card-title" style="color:#C4C4C4">ABOUT INFO</h5>
                            </form>
                            <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                                <div class="card text-center">
                                    <div class="card-body">
												<textarea name="about_app_ar" id="resoen_1"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->about_app_ar }}</textarea>

                                    </div>
                                </div>
                                <div>
                                    <h6 class="text-right" style="padding-left: 35px;">عن التطبيق (بالعربي)</h6>
                                </div>
                            </div>
                            <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                                <div class="card text-center">

                                    <div class="card-body">
												<textarea name="about_app_en" id="resoen_2"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->about_app_en }}</textarea>

                                    </div>
                                </div>
                                <div>
                                    <h6 class="text-right" style="padding-left: 35px;">عن التطبيق (بالإنجليزي)</h6>
                                </div>
                            </div>
                            <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                                <div class="card text-center">

                                    <div class="card-body">
												<textarea name="terms_and_conditions_ar" id="resoen_3"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->terms_and_conditions_ar }}</textarea>

                                    </div>
                                </div>
                                <div>
                                    <h6 class="text-right" style="padding-left: 35px;">الشروط والأحكام بالعربي
                                        (بالعربي)</h6>
                                </div>
                            </div>
                            <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                                <div class="card text-center">

                                    <div class="card-body">
												<textarea name="terms_and_conditions_en" id="resoen_4"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->terms_and_conditions_en }}</textarea>

                                    </div>
                                </div>
                                <div>
                                    <h6 class="text-right" style="padding-left: 35px;">الشروط والأحكام (بالإنجليزي)</h6>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="usage_policy_ar" id="resoen_5"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->usage_policy_ar }}</textarea>

                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;">سياسة الاستخدام (بالعربي)</h6>
                            </div>
                        </div>
                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="usage_policy_en" id="resoen_6"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->usage_policy_en }}</textarea>

                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;">سياسة الإستخدام (بالإنجليزي)</h6>
                            </div>
                        </div>
                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="terms_and_conditions_store_ar" id="resoen_7"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->terms_and_conditions_store_ar }}</textarea>

                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;">الشروط والإحكام للمتاجر
                                    (بالعربي)</h6>
                            </div>
                        </div>
                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="terms_and_conditions_store_en" id="resoen_8"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->terms_and_conditions_store_en }}</textarea>

                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;">الشروط والأحكام للمتاجر
                                    (بالإنجليزي)</h6>
                            </div>
                        </div>
                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="terms_and_conditions_captain_ar" id="resoen_9"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->terms_and_conditions_captain_ar }}</textarea>

                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;">الشروط والأحكام للكباتن
                                    (بالعربي)</h6>
                            </div>
                        </div>
                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="terms_and_conditions_captain_en" id="resoen_10"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->terms_and_conditions_captain_en }}</textarea>

                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;">الشروط والأحكام للكباتن
                                    (بالإنجليزي)</h6>
                            </div>
                        </div>
                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="card_desc_ar" id="resoen_11"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->card_desc_ar }}</textarea>

                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;"> وصف الشارت (بالعربي)</h6>
                            </div>
                        </div>
                        <div class="d-flex justifu-content-between mt-5" style="margin-left: 0%;">
                            <div class="card text-center">

                                <div class="card-body">
												<textarea name="card_desc_en" id="resoen_12"
                                                          placeholder="أكتب ونسق أي شيء تريد!">{{ $item?->card_desc_en }}</textarea>
                                </div>
                            </div>
                            <div>
                                <h6 class="text-right" style="padding-left: 35px;"> وصف الشارت (بالإنجليزي)</h6>
                            </div>
                        </div>

                    </div>

                    <div style="padding: 20px 10px;">
                        <button type="submit" class="btn w-100" style="background:#13C27E; color:white;">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="tinymce/tinymce.min.js"></script>
    <script src="assets/js/tinymce.js"></script>
@endsection
