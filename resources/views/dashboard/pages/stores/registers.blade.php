@extends('dashboard.layout')
@section('menu_9_item_2', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row ">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="/stores">المتاجر</a></h3>
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
                                    <a href="/stores/create">
                                        <button type="button" class="btn-green table-buttons7 btn text-white">إضافة جديد
                                            <i class="fa-solid fa-plus"></i></button>
                                    </a>
                                </div>

                                <div class="d-flex dix-h2" style="margin:16px 22px 0px 10px">
                                    <h5 style="font-size:18px;color: #3CD6D5;">المتاجر</h5>
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
                                        <th scope="col">صورة شهادة ضريبة القيمة المضافة</th>
                                        <th scope="col">الإسم التجاري</th>
                                        <th scope="col">رقم السجل التجاري</th>
                                        <th scope="col">التصنيف</th>
                                        <th scope="col">البريد الالكتروني الرسمي</th>
                                        <th scope="col">التسجيل الضريبي</th>
                                        <th scope="col">المدينة</th>
                                        <th scope="col">إسم المسؤوول</th>
                                        <th scope="col">رقم جوال المسؤول</th>
                                        <th scope="col">منصبه</th>
                                        <th scope="col">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center;" id="row-{{$item->id}}">
                                            <td><input onchange="checkbox({{$item->id}})" type="checkbox" id="{{$item->id}}"></td>
                                            <td><img src="{{$item?->logo}}" width="40" height="40" alt=""></td>
                                            <td>{{$item?->brand_name}}</td>
                                            <td>{{$item?->registration_number}}</td>
                                            <td>{{$item?->classification}}</td>
                                            <td>{{$item?->store_email}}</td>
                                            <td>{{$item?->registered}}</td>
                                            <td>{{$item?->city}}</td>
                                            <td>{{$item?->mod_name}}</td>
                                            <td>{{$item?->mod_phone}}</td>
                                            <td>{{$item?->position}}</td>
                                            <th>
                                                <div class="dropdown" style="direction: rlt;">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                       data-toggle="dropdown" aria-expanded="false"
                                                       style="color: #333; text-decoration: none;">... </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="/stores/delete/{{$item->id}}"
                                                           style=" text-align: right;direction: ltr;">
                                                            <i class="fa-solid fa-trash-can"
                                                               style="margin-right: 54px;"></i>
                                                                حذف
                                                        </a>
                                                        <a class="dropdown-item" href="/stores/edit/{{$item->id}}"
                                                           style=" text-align: right;">قبول <i class="fa-solid fa-pen "
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
                $.post( "/stores/groupDelete", {ids: ids}).done(function() {
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
