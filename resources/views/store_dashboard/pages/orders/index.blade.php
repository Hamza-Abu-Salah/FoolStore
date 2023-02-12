@extends('store_dashboard.layout')
@section('menu_4', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="">الطلبات</a> </h3>
                </div>
                <div class="content1 content container-fluid " style="padding-bottom: 40px;background: #E5E5E5;">

                    <div class="buttons">

                        <div class="bg-white">


                            <div class="btn1 d-flex justify-content-between ">
                                <div class="fix-buttonss6 d-flex fix-buttonss2  dived "
                                     style=" margin:8px 70px 12px 15px">
                                    <div class="btn-move table-buttons7 p-1 dropdown "
                                                                             style="background: #6F809E; margin-right:5px;  ">
                                        <a class="text-white dropdown-toggle " href="#" role="button"
                                           data-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                                            <i class="fa-solid fa-file-export"></i> تصدير </a>
                                        <div class="dropdown-menu">
                                            <a id="pdf" class="dropdown-item" href="#">تصدير pdf</a>
                                            <a onclick="exportReportToExcel(this)" class="dropdown-item" href="#">تصدير Excel</a>
                                        </div>
                                    </div>
                                    <button onclick="printData()" type="button" class="btn-blac table-buttons7 btn text-white"
                                            style="background: #3B3333">طباعة
                                    </button>
                                </div>
                                <div class="btn2 d-flex">
                                    <div class=" d-flex " style="margin:16px 22px 15px 10px">
                                        <h5 style="font-size:18px;color: #3CD6D5;">الطلبات </h5>
                                        <i class="fa-solid fa-list-ul " width="20" height="18"
                                           style="margin-top: 3px; margin-left:5px ;color: #3CD6D5;"></i>
                                    </div>

                                </div>

                            </div>
                            <hr style="margin: 0; color: #C4C4C4;">
                            <form action="">
                                <div class="row">
                                    <div class=" col-sm-6" style="text-align: right;">
                                        <a href="" type="button" class="mt-2 fix-button btn text-white "
                                           style="background: #14D3C8; width: 112px; height: 35px;font-size: 12px;">
                                            إعدة تحميل <i class="fa-solid fa-rotate" style="margin-left: 8px;"></i></a>
                                        <button type="submit" class="mt-2 fix-button btn text-white "
                                                style="background: #4090CD; width: 80px; height: 35px;font-size: 12px;">
                                            تصفية<i class="fa-solid fa-filter" style="margin-left: 8px;"></i></button>
                                    </div>
                                    <!--<i class="fa-solid fa-rotate"></i> -->
                                    <div class=" col-sm-6" style="text-align: right;">
                                        <input name="to" class="mt-2 lable " type="date" placeholder="إلى"
                                               style="border:0 ;background: #F4F7FC; text-align: right; height: 35px; ">
                                        <input name="from" type="date" class="lable1" placeholder="من"
                                               style="border:0 ; background: #F4F7FC;text-align: right;margin-right: 20px;height: 35px; ">
                                    </div>
                                </div>
                            </form>

                            <div class="fix-buttonss1 table-responsive" style=" width: 100%;">

                                <table id="example"
                                       class="table-inline1  table-inline table-responsive table table-striped table-bordered"
                                       style="width:100%;color: #3CD6D5;">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col" style="text-align: right;">رقم الطلب</th>
                                        <th scope="col" style="text-align: right;">إسم العميل</th>
                                        <th scope="col" style="text-align: right;">إسم الكابتن</th>
                                        <th scope="col" style="text-align: right;">إسم المتجر</th>
                                        <th scope="col" style="text-align: right;">إجمالي التكلفة</th>
                                        <th scope="col" style="text-align: right;">الحالة</th>
                                        <th scope="col" style="text-align: right;">تاريخ الطلب</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center; font-size: 12px; color: #3CD6D5;">
                                            <td>#{{ $item->id }}</td>
                                            <td>{{ $item?->user?->name }}</td>
                                            <td>{{ $item?->captain?->name }}</td>
                                            <td>{{ $item?->store?->name }}</td>
                                            <td>{{ $item?->price }}</td>
                                            <td>
                                                @if($item->status == '0')
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #E05656">ملغي
                                                    </button>
                                                @elseif($item->status == '1')
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #FDAA2E">في الانتظار
                                                    </button>
                                                @elseif($item->status == '2')
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #56E074">تم التوصيل
                                                    </button>
                                                @else
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #E05656">ملغي للتأخير
                                                    </button>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at->format('m-d-Y') }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
