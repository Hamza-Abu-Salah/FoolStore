@extends('store_dashboard.layout')
@section('menu_2_item_1', 'active')
@section('content')
    <div class="page-wrapper" style="background:#E5E5E5 ; height: 150%;">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/store/products/categories">الأقسام</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a
                            href="">تعديل  قسم</a></h3>
                </div>
            </div>
        </div>
        <form method="post" action="/store/products/categories/update/{{$item->id}}" enctype="multipart/form-data" class="row " style="text-align: right;">
            @csrf
            <div class="content1 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="color:#3CD6D5">تعديل  قسم</h5>                            </div>
                    <div class="card-body fix-withe6" >
                        <form action="#" >

                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4"> إسم القسم (بالعربي)</label>
                                <input value="{{$item?->name_ar}}" name="name_ar" type="text" id="text" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4">إسم القسم (بالإنجليزي)</label>
                                <input value="{{$item?->name_en}}" name="name_en" type="text" id="name" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
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
