@extends('store_dashboard.layout')
@section('menu_3_item_1', 'active')
@section('content')
    <div class="page-wrapper" style="background:#E5E5E5 ; height: 150%;">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/store/products">المنتجات</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a
                            href="">تعديل قسم</a></h3>
                </div>
            </div>
        </div>
        <form method="post" action="/store/products/update/{{$item->id}}" enctype="multipart/form-data" class="row " style="text-align: right;">
            @csrf
            <div class="content1 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="color:#3CD6D5">إضافة  منتج</h5>                            </div>
                    <div class="card-body fix-withe6" >
                        <form action="#" >

                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4">القسم</label>
                                <select name="category_id" id="text" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $item->category_id? 'selected' : '' }}>{{ $category?->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4"> إسم المنتج (بالعربي)</label>
                                <input value="{{ $item?->name_ar }}" name="name_ar" type="text" id="text" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4">إسم المنتج (بالإنجليزي)</label>
                                <input value="{{ $item?->name_en }}" name="name_en" type="text" id="name" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>

                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4"> سعر المنتج</label>
                                <input value="{{ $item?->price }}" name="price" type="number" id="text" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>

                            <div class="row d-flex text-center">
                                <div class="col-sm-12">
                                    <div class="card" style="border: 0;">
                                        <div class="fix-withe6 card-body" style="text-align: right;">
                                            <div>
                                                <img src="/{{ $item?->image }}" alt="" id="image" width="179px" height="149px"><br>
                                                <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="file" class="inputfile" width="179px"
                                                       height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="file" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">صورة المنتج</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>

                    <div style="padding: 20px 10px;">
                        <button type="submit" class="btn w-100" style="background:#13C27E; color:white;">حفظ</button>
                    </div>
                </div>

            </div>
        </form>
        <!-- style="text-align: right;" -->


    </div>
@endsection
