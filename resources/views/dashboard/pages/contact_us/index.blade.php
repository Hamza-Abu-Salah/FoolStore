@extends('dashboard.layout')
@section('menu_16', 'active')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        الرئيسية <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a href=""> إتصل بنا</a></h3>
                </div>
                <div class="content1 content container-fluid " style="background: #E5E5E5;">

                    <div class="buttons">

                        <div class="bg-white">


                            <div class="btn1 d-flex justify-content-between">
                                <div class="fix-buttonss6  d-flex fix-buttonss2  dived">
                                    <div class="Export p-1 dropdown btn-move">
                                        <a class="text-white dropdown-toggle mt-2" href="#" role="button"
                                           data-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                                            <i class="fa-solid fa-file-export" style="font-size:12px"></i> تصدير </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">تصدير PDF </a>
                                            <a class="dropdown-item" href="#">تصدير EXCEL </a>
                                        </div>
                                    </div>
                                    <button onclick="printData()" type="button" class="btn-blac table-buttons7 btn text-white"
                                            style="background: #3B3333">طباعة
                                    </button>
                                </div>
                                <div class="btn2 d-flex">
                                    <div class=" fix-withe3" style="margin:8px 70px 12px 15px">
                                        <button type="button"
                                                class="fox-mar fix-buttonss56 btn-red fix-button btn text-white ">حذف
                                            متعدد<i class="fa-solid fa-trash-can" style="margin-left: 8px;"></i>
                                        </button>
                                    </div>
                                    <!-- <i class="fa-solid fa-plus"></i> -->
                                    <div class=" d-flex " style="margin:16px 22px 15px 10px">
                                        <h5 style="font-size:18px;color: #3CD6D5;">إتصل بنا </h5>
                                        <i class="fa-solid fa-list-ul " width="20" height="18"
                                           style="margin-top: 3px; margin-left:5px ;color: #3CD6D5;"></i>
                                    </div>

                                </div>
                                <!-- <i class="fa-solid fa-list-ul"></i> -->


                            </div>
                            <hr style="margin: 0; color: #C4C4C4;">


                            <div class="table-responsive" style=" width: 100%;">

                                <table id="example"
                                       class="table-inline1  table-inline table-responsive table table-striped table-bordered"
                                       style="width:100%;color:#3CD6D5">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col" style="text-align: right;" data-orderable="false"><input onchange="checkbox(0)" type="checkbox" id="0"></th>
                                        <th scope="col" style="text-align: right;">الإسم</th>
                                        <th scope="col" style="text-align: right;">البريد الإلكتروني</th>
                                        <th scope="col" style="text-align: right;">الرسالة</th>
                                        <th scope="col" style="text-align: right;">تاريخ الإرسال</th>
                                        <th scope="col" style="text-align: right;">حالة الرسالة</th>
                                        <th scope="col" style="text-align: right;">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center;" id="row-{{$item->id}}">
                                            <td><input onchange="checkbox({{$item->id}})" type="checkbox" id="{{$item->id}}"></td>
                                            <td>
                                                @if($item->user_id !== null)
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #4090CD">{{ $item?->user?->name }}
                                                    </button>
                                                @else
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #FFCE36">غير مسجل
                                                    </button>
                                                @endif
                                            </td>
                                            <td>{{ $item?->user?->email }}</td>
                                            <td> {{ $item?->message }}</td>
                                            <td>{{ $item?->created_at->format('d m Y') }}</td>
                                            <td>
                                                @if($item->replied)
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #4090CD">تم الرد
                                                    </button>
                                                @else
                                                    <button type="button" class="btn text-white"
                                                            style="font-size: 12px;background: #FFCE36"> جديد
                                                    </button>
                                                @endif
                                            </td>
                                            <th>
                                                <div class="dropdown" style="direction: rlt;">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                       data-toggle="dropdown" aria-expanded="false"
                                                       style="color: #333; text-decoration: none;">... </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="/call-us/delete/{{$item->id}}"
                                                           style=" text-align: right;direction: ltr;">
                                                            <i class="fa-solid fa-trash-can"
                                                               style="margin-right: 54px;"></i>
                                                            حذف
                                                        </a>
                                                        <br>
                                                        <button type="button" class=" btn  " data-toggle="modal"
                                                                data-target="#staticBackdrop" style="border: none;">
                                                            رد <i class="fa-solid fa-reply"
                                                                  style="margin-right: 82px;"></i>
                                                        </button>
                                                    </div>
                                                    <!-- <i class="fa-solid fa-reply"></i> -->
                                                </div>
                                            </th>
                                        </tr>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <form action="/call-us/reply/{{$item->id}}">
                                                @csrf
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="direction: rtl;">
                                                            <h5 class="modal-title " id="staticBackdropLabel">الرد عالرسالة </h5>
                                                            <button type="button"
                                                                    style="margin-left: 0; border: none; outline: none; background: none"
                                                                    class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body fix-withe6" style="text-align: -webkit-right;">
                                                                <div class="form-group">
                                                                    <input name="reply" type="text" id="text" class="form-control"
                                                                           placeholder=" الرد"
                                                                           style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer" style="justify-content: flex-start;">
                                                            <button type="button" class="btn btn-white" data-bs-dismiss="modal"
                                                                    style="border: 1px solid #333; width: 100px; height: 35px;">إلغاء
                                                            </button>
                                                            <button type="submit" class="btn btn-white text-white"
                                                                    data-bs-dismiss="modal"
                                                                    style=" background: #3CD6D5; width: 100px; height: 35px;">إرسال الرد
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
                $.post( "/call-us/groupDelete", {ids: ids}).done(function() {
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
