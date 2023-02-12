@extends('dashboard.layout')
@section('menu_3', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="/user">المستخدمين</a> <i
                            class="fa-solid fa-angle-left"></i> <a href="">بيانات المستخدم</a></h3>
                </div>
            </div>
        </div>
        <div class="contant1  page-wrapper"
             style="background:#E5E5E5 ; height: 150%;margin-right: 0; padding-top:10px ;padding: 10px 40px 40px;">


            <div class="row " style="text-align: right;">
                <div class=" col-sm-12">
                    <div class=" card">
                        <div class="card-header">
                            <div>
                                <h5 class="card-title" style="color:#3CD6D5" style="margin-right: 5px;"> بيانات
                                    المستخدم </h5>
                            </div>
                            <hr>
                            <div class="row align-items-center d-flex">
                                <div class=" card" style="width: 21rem; box-shadow: 0px 0px 4px 0px;">
                                    <div class="card-header" style="color: #3CD6D5;">
                                        <i class="fa-solid fa-rotate" style="margin-right: 41%;color: #C4C4C4; "></i>
                                        معلومات الحساب
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <div class="d-flex justify-content-between">
                                            <div class="m-3">
                                                <th><i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                </th>
                                            </div>
                                            <div>
                                                <li class="list-group-item">التقييم</li>
                                            </div>

                                        </div>
                                        <hr style="margin: 0; background:#A3A3A3">
                                        <div class="d-flex justify-content-between">
                                            <span style="color: #3CD6D5;padding-left: 10px;"
                                                  class="mt-3"><p>{{ $item->orders->count() }}</p></span>
                                            <div>
                                                <li class="list-group-item">عدد الطلبات</li>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
													<span style="color: #3CD6D5; padding-left: 10px;" class="mt-3"><div
                                                            class="status-toggle">
														<input type="checkbox" id="status_1" class="check" {{ $item->status? 'checked' : '' }}>
														<label for="status_1" class="checktoggle">checkbox</label>
													</div></span>
                                            <div>
                                                <li class="list-group-item">حالة المستخدم</li>
                                            </div>
                                        </div>
                                        <hr style="margin: 0; background:#A3A3A3">
                                    </ul>
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-1" style="font-size: 20px;">Ryan Taylor</h4>

                                    <h6 class="text-muted" style="color: #A3A3A3;"> ryant@admin.com <i
                                            class="fa-solid fa-envelope" style="color: #A3A3A3;"></i></h6>
                                    <div class="user-Location" style="color: #A3A3A3;font-size: 16px;"> Florida, United
                                        States <i class="fa-solid fa-phone"></i></div>
                                </div>
                                <div class="col-auto profile-image" style="padding:30px;">
                                    <a href="#">
                                        <img class="rounded-circle" style="border-radius: 0;" alt="User Image"
                                             width="222" height="184" src="../assets/img/avatar-03.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="row table-responsive" style="width: 103%;">
                                <div class="col-md-6 d-flex" style="margin-left: 50%;">
                                    <div class="card-body ">
                                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                            <li class="nav-item"><a class="nav-link" href="#money"
                                                                    data-toggle="tab">المعاملات المالبة</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#rates" data-toggle="tab">التقييم</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link active" href="#orders"
                                                                    data-toggle="tab">الطلبات</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <hr style="margin:0 0 10px 0; background: #A3A3A3; ">
                                <div class="tab-pane fade" id="money">
                                    <table class="table table-striped table-hover  table-bordered "
                                           style="width: 100%; border: 1px solid #C4C4C4; padding:0 5px ;">
                                        <thead>
                                        <tr style="text-align: center;background: rgba(64, 144, 205, 0.2);">
                                            <th scope="col">قيمة التحويل</th>
                                            <th scope="col"> تفاصيل العملية</th>
                                            <th scope="col">رقم الطلب</th>
                                            <th scope="col">رقم العملية</th>
                                            <th scope="col">نوع العملية</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr style="text-align: center;">
                                            <td> 170</td>
                                            <td>لقد قمت بتحويل 170 ريال سعودي لمحفظة mohameed</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>عملية التحويل</td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td> 75</td>
                                            <td>لقد تم خصم 57 ريال سعودي من محفظتك</td>
                                            <td>120</td>
                                            <td>-</td>
                                            <td>عملية التحويل</td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td> 100</td>
                                            <td>لقد قمت بشحن محفظتك بقيمة 100 ريال سعودي</td>
                                            <td>-</td>
                                            <td>26129815612681651</td>
                                            <td>عملية التحويل</td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="rates">
                                    <table class="table table-striped table-hover  table-bordered "
                                           style="width: 100%; border: 1px solid #C4C4C4; padding:0 5px ;">
                                        <thead>
                                        <tr style="text-align: center;background: rgba(64, 144, 205, 0.2);">

                                            <th scope="col"> تعليق</th>
                                            <th scope="col">التقييم</th>
                                            <th scope="col">اسم المندوب</th>
                                            <th scope="col">رقم الطلب</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr style="text-align: center;">
                                            <td>عميل مميز</td>
                                            <td>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>

                                            </td>
                                            <td></td>
                                            <td>188</td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade active show" id="orders">
                                    <table class=" table table-striped table-hover  table-bordered "
                                           style="width: 100%; border: 1px solid #C4C4C4; padding:0 5px ;">
                                        <thead>
                                        <tr style="text-align: center; background: rgba(64, 144, 205, 0.2);">
                                            <th scope="col">تاريخ الطلب</th>
                                            <th scope="col">إجمالي الطلب</th>
                                            <th scope="col">الحالة</th>
                                            <th scope="col">الإسم</th>
                                            <th scope="col">نوع الطلب</th>
                                            <th scope="col">رقم الطلب</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($item->orders as $order)
                                            <tr style="text-align: center;">
                                                <td>{{ $order?->created_at->format('d-m-Y') }}</td>
                                                <th>{{ $order?->price }}</th>
                                                <td>
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #EAA038">
                                                        @if($order->status == '0')
                                                            ملغي
                                                        @elseif($order->status == '1')
                                                            في الانتظار
                                                        @elseif($order->status == '2')
                                                            تم التوصيل
                                                        @else
                                                            ملغي بسبب التأخير
                                                        @endif
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #3CD6D5">
                                                        {{ $item?->name }}
                                                    </button>
                                                </td>
                                                <td>
                                                    @if($order->type == '1')
                                                        طلب عادي
                                                    @else
                                                        طلب الكتروني
                                                    @endif
                                                </td>
                                                <td>#{{$order->id}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
