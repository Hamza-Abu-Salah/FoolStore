@extends('dashboard.layout')
@section('menu_rates_item_1', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row ">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="">التقييمات</a></h3>
                </div>
            </div>
        </div>
        <div class="table-responsive " style="background: #E5E5E5;">
            <div class="fix-button content1 content container-fluid">

                <div style="">

                    <div class="bg-white" style="    width: 92%;">


                        <div class="table-inline2 d-flex justify-content-between ">
                            <div style="margin:8px 70px 0px 15px">

                                <div class="table-buttons7 d-flex fix-buttonss2  dived"
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
                            </div>
                            <div class="d-flex">
                                <div class="d-flex dix-h2" style="margin:16px 22px 0px 10px">
                                    <h5 style="font-size:18px;color: #3CD6D5;">التقييمات</h5>
                                    <i class="fa-solid fa-list-ul "
                                       style="margin-top: 3px; margin-left:5px ;color: #3CD6D5;"></i>
                                </div>

                            </div>
                            <!-- <i class="fa-solid fa-list-ul"></i> -->
                        </div>
                        <hr style=" color: #C4C4C4;">
                        <!--  -->
                        <div class="card-body">
                            @if(session('success'))
                                <span class="badge badge-success" style="float: right;">
                                    {{ session('success') }}
                                </span>
                            @endif
                            <div class="table-responsive" style="width: 100%;">
                                <table id="example" class="table-inline1 table table-striped table-bordered"
                                       style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">التقييم</th>
                                        <th scope="col">عدد الطلبات</th>
                                        <th scope="col">آخر طلب بتاريخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item?->name_ar?? 'غير متوفر' }}</td>
                                            <td>
                                                @for($i = 0; $i < $item->rate; $i++)
                                                    <i class="fe fe-star text-warning"></i>
                                                @endfor
                                                @for($i = 0; $i < (5-$item->rate); $i++)
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                @endfor
                                            </td>
                                            <td>{{ $item->orders_count?? 'غير متوفر' }}</td>
                                            <td>{{ $item->last_order == null? 'لا يوجد اي طلب' : $item->last_order->format('d-m-Y') }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="direction: rtl;">
                                        <h5 class="modal-title " id="staticBackdropLabel">Confirmation</h5>
                                        <button type="button"
                                                style="margin-left: 0; border: none; outline: none; background: none"
                                                class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body fix-withe6" style="text-align: -webkit-right;">
                                            <p>هل أنت متأكد من حذف هذه الرسالة؟</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="justify-content: flex-start;">
                                        <button type="button" class="btn btn-white" data-bs-dismiss="modal"
                                                style="border: 1px solid #333; width: 100px; height: 35px;">إلغاء
                                        </button>
                                        <button type="button" class="btn text-white "
                                                style="background: #FF4432;width: 100px; height: 37px;  ">حذف
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
