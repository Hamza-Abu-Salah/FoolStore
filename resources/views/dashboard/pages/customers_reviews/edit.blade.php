@extends('dashboard.layout')
@section('menu_9_item_1', 'active')
@section('content')
    <div class="page-wrapper" style="background:#E5E5E5 ; height: 150%;">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/customers/reviews">آراء العملاء</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a href="">إضافة آراء العملاء</a></h3>
                </div>
            </div>
        </div>
        <div class="row " style="text-align: right;">
            <div class=" content1 col-sm-12">
                <form action="/customers/reviews/update/{{$item->id}}" method="post" enctype="multipart/form-data">
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
                            <h5 class="card-title" style="color:#3CD6D5">إضافة آراء العملاء</h5>
                        </div>
                        <div class="fix-withe6 card-body">
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4"> اسم الزبون
                                    بالعربي</label>
                                <input value="{{$item?->name_ar}}" name="name_ar" type="text" id="text" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">اسم الزبون
                                    بالانجليزي </label>
                                <input value="{{$item?->name_en}}" name="name_en" type="text" id="name" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">المحتوى
                                    بالعربي </label>
                                <input value="{{$item?->content_ar}}" name="content_ar" type="text" id="number" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">المحتوى
                                    بالانجليزي </label>
                                <input value="{{$item?->content_en}}" name="content_en" type="text" id="number" class="form-control"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 16px; color: #C4C4C4">الحالة</label>
                                <select name="status" type="text" id="status" class="form-control"
                                        style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                    <option value="1" {{ $item?->status? 'selected' : '' }}>مفعل</option>
                                    <option value="0" {{ $item?->status? '' : 'selected' }}>غير مفعل</option>
                                </select>
                            </div>
                            <div class="row d-flex text-center">
                                <div class="col-sm-12">
                                    <div class="card" style="border: 0;">
                                        <div class="fix-withe6 card-body" style="border: 0;">
                                            <div>
                                                <img src="/{{ $item?->avatar }}" alt="" width="179px"
                                                     height="149px" id="image"><br>
                                                <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" name="avatar" id="avatar" class="inputfile"
                                                       width="179px"
                                                       height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="avatar" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">
                                                    صورة شخصية
                                                </label>
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
