@extends('dashboard.layout')
@section('menu_6', 'active')
@section('content')
    <div class="page-wrapper" style="background:#E5E5E5 ; height: 150%;">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/categories">الأقسام</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a href="">إضافة  قسم</a></h3>
                </div>
            </div>
        </div>
        <form method="post" action="/categories/store" enctype="multipart/form-data" class="row " style="text-align: right;">
            @csrf
            <div class="content1 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="color:#3CD6D5">إضافة  قسم</h5>                            </div>
                    <div class="card-body fix-withe6" >
                        <form action="#" >

                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4"> إسم القسم (بالعربي)</label>
                                <input name="name_ar" type="text" id="text" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4">إسم القسم (بالإنجليزي)</label>
                                <input name="name_en" type="text" id="name" class="form-control"  style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>

                            <hr style="margin-top: 50px;">

                            <div class="row d-flex text-center">
                                <div class="col-sm-12">
                                    <div class="card" style="border: 0;">
                                        <div class="fix-withe6 card-body" style="text-align: right;">
                                            <div>
                                                <img src="/assets/img/avatar-03.jpg" alt="" id="image" width="179px" height="149px"><br>
                                                <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="file" class="inputfile" width="179px"
                                                       height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="file" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">صورة القسم</label>
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
