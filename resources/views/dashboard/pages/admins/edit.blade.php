@extends('dashboard.layout')
@section('menu_2', 'active')
@section('content')
    <div class="content1 page-wrapper" style="background:#E5E5E5 ; height: 150%; ">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12" style="    margin-top: 20px;">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/admins">المشرفين</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a href="">إضافة مشرف</a></h3>
                </div>
            </div>
        </div>
        <div class="row " style="text-align: right;">
            <div class="col-sm-12">
                <form action="/admins/update/{{$item->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title" style="color:#3CD6D5">تعديل مشرف</h5>                            </div>
                        @if(session('error'))
                            <span class="badge badge-danger" style="float: right;">
                                    {{ session('error') }}
                                </span>
                        @endif
                        <div class="card-body" >
                            <form action="#">
                                <div class="form-group">
                                    <label style="color: #C4C4C4;">إسم المشرف</label>
                                    <input value="{{ $item?->name }}" name="name" type="text" id="text" class="form-control" style="text-align: right;">
                                </div>
                                <div class="form-group">
                                    <label  style="color: #C4C4C4;">البريد الإلكتروني</label>
                                    <input value="{{ $item?->email }}" name="email" type="emil" id="email" class="form-control" style="text-align: right;">
                                </div>
                                <div class="form-group">
                                    <label  style="color: #C4C4C4;">كلمة المرور</label>
                                    <input name="password" type="password" id="password" class="form-control" style="text-align: right;">
                                </div>
                                <img src="/{{ $item?->avatar }}" id="avatar" alt="" width="179px" height="149px"><br>
                                <input onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])" type="file" name="avatar" id="file" class="inputfile" width="179px"
                                       height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                <label for="file" class="btn btn-info mt-2 "
                                       style="cursor: pointer; width:180px;height:40px">اختر صورة</label>
                                <br>
                            </form>
                        </div>

                        <div class="card card-table " >
                            <div class="card-body" style="width: 91%;">
                                <div class="table-responsive">
                                    <table class=" table table-striped table-hover table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>إرسال اشعار</th>
                                            <th>رد</th>
                                            <th>موافقة</th>
                                            <th>حذف</th>
                                            <th>تعديل</th>
                                            <th>التفاصيل</th>
                                            <th>إضافة</th>
                                            <th>عرض</th>
                                            <th>الصلاحيات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="admins/delete" id="admins/delete" class="check" {{ $item->url["admins/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="admins/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="admins/edit" id="admins/edit" class="check" {{ $item->url["admins/edit"] == "on"? 'checked' : '' }}>
                                                    <label for="admins/edit" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="admins/details" id="admins/details" class="check" {{ $item->url["admins/details"] == "on"? 'checked' : '' }}>
                                                    <label for="admins/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="admins/create" id="admins/create" class="check" {{ $item->url["admins/create"] == "on"? 'checked' : '' }}>
                                                    <label for="admins/create" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="admins" id="admins" class="check" {{ $item->url["admins"] == "on"? 'checked' : '' }}>
                                                    <label for="admins" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>المشرفين</td>

                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="users/accept" id="users/accept" class="check" {{ $item->url["users/accept"] == "on"? 'checked' : '' }}>
                                                    <label for="users/accept" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="users/edit" id="users/edit" class="check" {{ $item->url["users/edit"] == "on"? 'checked' : '' }}>
                                                    <label for="users/edit" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >

                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="users" id="users" class="check" {{ $item->url["users"] == "on"? 'checked' : '' }}>
                                                    <label for="users" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>المستخدمين</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="leaders/accept" id="leaders/accept" class="check" {{ $item->url["leaders/accept"] == "on"? 'checked' : '' }}>
                                                    <label for="leaders/accept" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="leaders/delete" id="leaders/delete" class="check" {{ $item->url["leaders/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="leaders/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="leaders/edit" id="leaders/edit" class="check" {{ $item->url["leaders/edit"] == "on"? 'checked' : '' }}>
                                                    <label for="leaders/edit" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="leaders/details" id="leaders/details" class="check" {{ $item->url["leaders/details"] == "on"? 'checked' : '' }}>
                                                    <label for="leaders/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="leaders/create" id="leaders/create" class="check" {{ $item->url["leaders/create"] == "on"? 'checked' : '' }}>
                                                    <label for="leaders/create" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="leaders" id="leaders" class="check" {{ $item->url["leaders"] == "on"? 'checked' : '' }}>
                                                    <label for="leaders" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>الكباتن</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="sliders/delete" id="sliders/delete" class="check" {{ $item->url["sliders/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="sliders/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="sliders/details" id="sliders/details" class="check" {{ $item->url["sliders/details"] == "on"? 'checked' : '' }}>
                                                    <label for="sliders/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="sliders/edit" id="sliders/edit" class="check" {{ $item->url["sliders/edit"] == "on"? 'checked' : '' }}>
                                                    <label for="sliders/edit" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="sliders/create" id="sliders/create" class="check" {{ $item->url["sliders/create"] == "on"? 'checked' : '' }}>
                                                    <label for="sliders/create" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="sliders" id="sliders" class="check" {{ $item->url["sliders"] == "on"? 'checked' : '' }}>
                                                    <label for="sliders" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>السلايدر</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="categories/delete" id="categories/delete" class="check" {{ $item->url["categories/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="categories/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="categories/edit" id="categories/edit" class="check" {{ $item->url["categories/edit"] == "on"? 'checked' : '' }}>
                                                    <label for="categories/edit" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="categories/details" id="categories/details" class="check" {{ $item->url["categories/details"] == "on"? 'checked' : '' }}>
                                                    <label for="categories/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="categories/create" id="categories/create" class="check" {{ $item->url["categories/create"] == "on"? 'checked' : '' }}>
                                                    <label for="categories/create" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="categories" id="categories" class="check" {{ $item->url["categories"] == "on"? 'checked' : '' }}>
                                                    <label for="categories" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>الأقسام</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="stores/accept" id="stores/accept" class="check" {{ $item->url["stores/accept"] == "on"? 'checked' : '' }}>
                                                    <label for="stores/accept" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="stores/delete" id="stores/delete" class="check" {{ $item->url["stores/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="stores/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="stores/edit" id="stores/edit" class="check" {{ $item->url["stores/edit"] == "on"? 'checked' : '' }}>
                                                    <label for="stores/edit" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="stores/details" id="stores/details" class="check" {{ $item->url["stores/details"] == "on"? 'checked' : '' }}>
                                                    <label for="stores/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td><div class="status-toggle">
                                                    <input type="checkbox" name="stores/create" id="stores/create" class="check" {{ $item->url["stores/create"] == "on"? 'checked' : '' }}>
                                                    <label for="stores/create" class="checktoggle">checkbox</label>
                                                </div></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="stores" id="stores" class="check" {{ $item->url["stores"] == "on"? 'checked' : '' }}>
                                                    <label for="stores" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>المتاجر</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="coupons/delete" id="coupons/delete" class="check" {{ $item->url["coupons/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="coupons/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="coupons/edit" id="coupons/edit" class="check" {{ $item->url["coupons/edit"] == "on"? 'checked' : '' }}>
                                                    <label for="coupons/edit" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="coupons/details" id="coupons/details" class="check" {{ $item->url["coupons/details"] == "on"? 'checked' : '' }}>
                                                    <label for="coupons/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="coupons/create" id="coupons/create" class="check" {{ $item->url["coupons/create"] == "on"? 'checked' : '' }}>
                                                    <label for="coupons/create" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="coupons" id="coupons" class="check" {{ $item->url["coupons"] == "on"? 'checked' : '' }}>
                                                    <label for="coupons" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>كوبونات الخصم</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="reviews/accept" id="reviews/accept" class="check" {{ $item->url["reviews/accept"] == "on"? 'checked' : '' }}>
                                                    <label for="reviews/accept" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="reviews/delete" id="reviews/delete" class="check" {{ $item->url["reviews/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="reviews/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="reviews/details" id="reviews/details" class="check" {{ $item->url["reviews/details"] == "on"? 'checked' : '' }}>
                                                    <label for="reviews/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="reviews" id="reviews" class="check" {{ $item->url["reviews"] == "on"? 'checked' : '' }}>
                                                    <label for="reviews" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>المراجعات</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="orders/details" id="orders/details" class="check" {{ $item->url["orders/details"] == "on"? 'checked' : '' }}>
                                                    <label for="orders/details" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td >
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="orders" id="orders" class="check" {{ $item->url["orders"] == "on"? 'checked' : '' }}>
                                                    <label for="orders" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>الطلبات</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="call-us/reply" id="call_us/reply" class="check" {{ $item->url["call-us/reply"] == "on"? 'checked' : '' }}>
                                                    <label for="call_us/reply" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="call-us/delete" id="call_us/delete" class="check" {{ $item->url["call-us/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="call_us/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td ></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="call-us" id="call_us" class="check" {{ $item->url["call-us"] == "on"? 'checked' : '' }}>
                                                    <label for="call_us" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>إتصل بنا</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="notifications/delete" id="notifications/delete" class="check" {{ $item->url["notifications/delete"] == "on"? 'checked' : '' }}>
                                                    <label for="notifications/delete" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td ></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="notifications" id="notifications" class="check" {{ $item->url["notifications"] == "on"? 'checked' : '' }}>
                                                    <label for="notifications" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>الإشعارات</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td ></td>
                                            <td></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" name="settings" id="settings" class="check" {{ $item->url["settings"] == "on"? 'checked' : '' }}>
                                                    <label for="settings" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>الإعدادات</td>

                                        </tr>
                                        </tbody>
                                    </table>
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
        <!-- style="text-align: right;" -->


    </div>
@endsection
