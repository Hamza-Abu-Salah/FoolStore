@extends('dashboard.layout')
@section('menu_19_item_1', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row ">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="/customers/reviews">آراء العملاء</a></h3>
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
                                <div style="margin:22px 70px 12px 15px">

                                    <button onclick="groupDelete()" type="button" class="btn-red btn btn-primary  " style="border: none;">
                                        حذف متعدد <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <a href="/customers/reviews/create">
                                        <button type="button" class="btn-green table-buttons7 btn text-white">إضافة جديد
                                            <i class="fa-solid fa-plus"></i></button>
                                    </a>
                                </div>

                                <div class="d-flex dix-h2" style="margin:16px 22px 0px 10px">
                                    <h5 style="font-size:18px;color: #3CD6D5;">آراء العملاء</h5>
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
                                        <th scope="col" data-orderable="false"><input onchange="checkbox(0)" type="checkbox" id="0"></th>
                                        <th scope="col">الأفاتار</th>
                                        <th scope="col">إسم الشخص عربي</th>
                                        <th scope="col">إسم الشخص انجليزي</th>
                                        <th scope="col">المحتوى عربي</th>
                                        <th scope="col">المحتوى انجليزي</th>
                                        <th scope="col">الحالة</th>
                                        <th scope="col">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center;" id="row-{{$item->id}}">
                                            <td><input onchange="checkbox({{$item->id}})" type="checkbox" id="{{$item->id}}"></td>
                                            <td><img src="/{{$item?->avatar}}" width="40" height="40" alt=""></td>
                                            <td>{{$item?->name_ar}}</td>
                                            <td>{{$item?->name_en}}</td>
                                            <td>{{$item?->content_ar}}</td>
                                            <td>{{$item?->content_en}}</td>
                                            <td>
                                                @if($item->status)
                                                    <a href="/customers/reviews/toggle_status/{{$item->id}}" type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #17a700"> يتم العرض <i
                                                            class="fa-solid fa-check"></i></a>
                                                @else
                                                    <a href="/customers/reviews/toggle_status/{{$item->id}}" type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #3B3333"> مخفي <i
                                                            class="fa-solid fa-xmark"></i></a>
                                                @endif
                                            </td>
                                            <th>
                                                <div class="dropdown" style="direction: rlt;">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                       data-toggle="dropdown" aria-expanded="false"
                                                       style="color: #333; text-decoration: none;">... </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="/customers/reviews/delete/{{$item->id}}"
                                                           style=" text-align: right;direction: ltr;">
                                                            <i class="fa-solid fa-trash-can"
                                                               style="margin-right: 54px;"></i>
                                                                حذف
                                                        </a>
                                                        <a class="dropdown-item" href="/customers/reviews/edit/{{$item->id}}"
                                                           style=" text-align: right;">تعديل <i class="fa-solid fa-pen "
                                                                                                style="margin-right: 71px;"></i></a>
                                                    </div>
                                                </div>
                                            </th>

                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
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
                                        <button type="button" class="btn btn-white" data-dismiss="modal"
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


@section('scripts')
    <script>
        function checkRow(row) {
            let className = "row-" + row;
            $(".row-"+row).toggle();
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let ids = [];
        function checkbox(id) {
            if (id === 0) {
                if ($('#'+id).is(":checked")) {
                    @foreach($items as $item)
                    $("#{{$item->id}}").prop("checked", true);
                    ids.push({{$item->id}})
                    @endforeach
                } else {
                    @foreach($items as $item)
                    $("#{{$item->id}}").prop("checked", false);
                    ids = [];
                    @endforeach
                }
            } else {
                if ($('#'+id).is(":checked")) {
                    ids.push(id)
                } else {
                    $("#0").prop("checked", false);
                    ids.splice(ids.indexOf(id), 1)
                }
            }
        }

        function groupDelete() {
            if (ids.length > 0) {
                $.post( "/customers/reviews-/groupDelete", {ids: ids}).done(function() {
                    ids.forEach(item => {
                        $("#row-"+item).remove()
                    })
                    $("#0").prop("checked", false)
                }).fail(function() {

                });
            }
        }
    </script>
@endsection
