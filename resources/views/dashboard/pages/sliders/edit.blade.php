@extends('dashboard.layout')
@section('menu_5', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/sliders">السلايدر</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a
                            href="">تعديل السلايدر</a></h3>
                </div>
            </div>
        </div>
        <form method="post" action="/sliders/update/{{$item->id}}" enctype="multipart/form-data"
              class="content1 content container-fluid " style="padding-bottom: 40px;">
            @csrf

            <div class="buttons">

                <div class="bg-white">


                    <div class=" d-flex justify-content-between" style="direction: rtl;">

                        <div class="btn2 d-flex">

                            <div class="d-flex " style="margin:16px 22px 15px 10px;">
                                <h5 style="font-size:18px;color: #EDD75F;">تعديل السلايدر</h5>
                            </div>

                        </div>
                        <!-- <i class="fa-solid fa-list-ul"></i> -->


                    </div>
                    <hr style="margin: 0; color: #C4C4C4;">


                    <div class="row d-flex text-center" style="margin-right: 0;">
                        <div class="col-sm-12">
                            <div class="card" style="border: 0;">
                                <div class="fix-withe6 card-body" style="text-align: right;">
                                    <img src="{{ $item?->image }}" alt="" width="179px" id="image" height="149px"><br>
                                    <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="file" class="inputfile" width="179px"
                                           height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                    <label for="file" class="btn btn-info mt-2 "
                                           style="cursor: pointer; width:180px;height:40px">صورة</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="bg-white" style="text-align: right;margin-top: -31px;">
                <div class="fix-withe7 mb-2 mr-2">
                    <div>
                        <label class="text-dark">التاريخ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1" style="margin: 10px;">شهر</label>
                        <input {{ $item->date == 'day'? 'checked' : '' }} class="form-check-input" type="radio" name="date" id="inlineRadio1"
                               value="day">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio2" style="margin: 10px;">أسبوعين</label>
                        <input {{ $item->date == 'week'? 'checked' : '' }} class="form-check-input" type="radio" name="date" id="inlineRadio2"
                               value="week">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio3" style="margin: 10px;">أسبوع</label>
                        <input {{ $item->date == 'twoweeks'? 'checked' : '' }} class="form-check-input" type="radio" name="date" id="inlineRadio3"
                               value="twoweeks">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio3" style="margin: 10px;">يوم</label>
                        <input {{ $item->date == 'month'? 'checked' : '' }} class="form-check-input" type="radio" name="date" id="inlineRadio3"
                               value="month">
                    </div>
                </div>
                <div class=" fix-withe7 mr-2">
                    <div>
                        <label class="text-dark">المدة</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1" style="margin: 10px;">شهر</label>
                        <input {{ $item->date == 'day'? 'checked' : '' }} class="form-check-input" type="radio" name="long" id="inlineRadio1"
                               value="day">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio2" style="margin: 10px;">أسبوعين</label>
                        <input {{ $item->date == 'week'? 'checked' : '' }} class="form-check-input" type="radio" name="long" id="inlineRadio2"
                               value="week">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio3" style="margin: 10px;">أسبوع</label>
                        <input {{ $item->date == 'twoweeks'? 'checked' : '' }} class="form-check-input" type="radio" name="long" id="inlineRadio3"
                               value="twoweeks">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio3" style="margin: 10px;">يوم</label>
                        <input {{ $item->date == 'month'? 'checked' : '' }} class="form-check-input" type="radio" name="long" id="inlineRadio3"
                               value="month">
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label ">الرابط</label>
                                <div class="col-xl-6 dix-h5" style="margin-left: 50%;">
                                    <input value="{{ $item?->url }}" name="url" type="text" class="form-control" style="text-align: right;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="padding: 20px 10px;">
                    <button type="submit" class="btn w-100" style="background:#13C27E; color:white;">حفظ</button>
                </div>
            </div>


        </form>
    </div>
@endsection
