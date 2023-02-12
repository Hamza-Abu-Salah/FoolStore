@extends('dashboard.layout')
@section('menu_9_item_1', 'active')
@section('content')
    <div class="page-wrapper" style="background:#E5E5E5 ; height: 150%;">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/stores">المتاجر</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a href="">إضافة متجر</a></h3>
                </div>
            </div>
        </div>
        <div class="row " style="text-align: right;">
            <div class=" content1 col-sm-12">
                <form action="/stores/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if($errors->all())
                            @foreach($errors->all() as $error)
                                <div>
                                    <p class="text-danger" style="float: right;">
                                        {{$error}}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                        <div class="card-header">
                            <h5 class="card-title" style="color:#3CD6D5">إضافة متجر</h5>
                        </div>
                        <div class="fix-withe6 card-body">
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">القسم </label>
                                <select name="category_id" type="text" id="text" class="form-control"
                                        style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                    @forelse($categories as $category)
                                        <option value="{{$category->id}}">{{ $category?->name_ar }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4"> اسم المتجر
                                    بالعربي</label>
                                <input name="name_ar" type="text" id="text" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">اسم المتجر
                                    بالانجليزي </label>
                                <input name="name_en" type="text" id="name" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">وصف المتجر
                                    بالعربي </label>
                                <input name="description_ar" type="text" id="number" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">وصف المتجر
                                    بالانجليزي </label>
                                <input name="description_en" type="text" id="number" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4"> رقم هاتف
                                    المتجر </label>
                                <input name="phone" type="number" id="email" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">إسم المسؤول</label>
                                <input name="mod_name" type="text" id="email" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">رقم الهاتف
                                    للمسئول </label>
                                <input name="mod_phone" type="number" id="email" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">البريد
                                    الإلكتروني </label>
                                <input name="store_email" type="email" id="email" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="col-sm-12">
                                <div class=" card">
                                    <div class="card-header">
                                        <h5 class="card-title" style="color:#3CD6D5">لوحة تحكم</h5>
                                    </div>
                                    <div class="fix-withe6 card-body">
                                        <form action="#">
                                            <div class="form-group">
                                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">البريد
                                                    الإلكتروني </label>
                                                <input name="email" type="email" id="text" class="form-control"
                                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                            </div>
                                            <div class="form-group">
                                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">كلمة
                                                    المرور</label>
                                                <input name="password" type="password" id="text"
                                                       class="form-control"
                                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4"> عدد الفروع </label>
                                <input name="branch_count" type="number" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">الوقت المتوقع
                                    للتوصيل (بالدقيقة) </label>
                                <input name="expected_time" type="number" id="email" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">سعر التوصيل </label>
                                <input name="deli_price" type="number" id="email" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">الحد الأدنى
                                    لللطلب </label>
                                <input name="min_orders" type="number" id="email" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="row d-flex text-center">
                                <div class="col-sm-6">
                                    <div class="card" style="border: 0;">
                                        <div class="fix-withe6 card-body">
                                            <div>
                                                <img src="/assets/img/avatar-03.jpg" id="image" alt="" width="179px"
                                                     height="149px"><br>
                                                <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" name="background" id="file" class="inputfile"
                                                       width="179px"
                                                       height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="file" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">غلاف
                                                    المتجر</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card" style="border: 0;">
                                        <div class="fix-withe6 card-body" style="border: 0;">
                                            <div>
                                                <img src="/assets/img/avatar-03.jpg" alt="" width="179px" id="logo_"
                                                     height="149px"><br>
                                                <input onchange="document.getElementById('logo_').src = window.URL.createObjectURL(this.files[0])" type="file" name="logo" id="logo" class="inputfile"
                                                       width="179px"
                                                       height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="logo" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">لوجو
                                                    المتجر</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="padding: 20px 10px;">
                            <button type="submit" class="btn w-100" style="background:#13C27E; color:white;">حفظ
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
