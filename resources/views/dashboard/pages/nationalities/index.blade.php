@extends('dashboard.layout')
@section('menu_13', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="">الجنسيات</a></h3>
                </div>
                <div class="content1 content container-fluid " style="padding-bottom: 40px; background: #E5E5E5;">

                    <div class="buttons">
                        <div class="bg-white">
                            <div class="btn1 d-flex justify-content-between">
                                <div class="d-flex fix-buttonss2  dived" style=" margin:8px 70px 12px 15px">
                                    <div class="dix-btn1 p-1 dropdown btn-move">
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
                                    <div class="btn-if " style="margin:17px 70px 12px 15px">
                                        <button onclick="groupDelete()" type="button" class=" fix-button btn text-white "
                                                style="background: #F45959; font-size: 12px;">حذف متعدد<i
                                                class="fa-solid fa-trash-can" style="margin-left: 8px;"></i></button>
                                        <button type="button" class=" modal-button btn btn-green text-white "
                                                data-toggle="modal" data-target="#staticBackdrop">
                                            <i class="fa-solid fa-plus"></i> إضافة جديد
                                        </button>
                                    </div>
                                    <!-- <i class="fa-solid fa-plus"></i> -->
                                    <div class="h9 d-flex " style="margin:16px 22px 15px 10px">
                                        <h5 style="font-size:18px;color: #3CD6D5;">الجنسيات</h5>
                                        <i class="fa-solid fa-list-ul " width="20" height="18"
                                           style="margin-top: 3px; margin-left:5px ;color: #3CD6D5;"></i>
                                    </div>

                                </div>
                                <!-- <i class="fa-solid fa-list-ul"></i> -->


                            </div>
                            <hr style="margin: 0; color: #C4C4C4;">


                            @if(session('success'))
                                <p class="badge badge-success" style="float: right;">
                                    {{ session('success') }}
                                </p>
                            @endif
                            <div class="fix-buttonss1 table-responsive" style=" width: 100%;">

                                <table id="example"
                                       class="table-inline1  table-inline table-responsive table table-striped table-bordered"
                                       style="width:100%;color: #3CD6D5;">
                                    <thead>
                                    <tr style="text-align: center; ">
                                        <th scope="col" style="text-align: right;" data-orderable="false"><input onchange="checkbox(0)" type="checkbox" id="0"></th>
                                        <th scope="col" style="text-align: right;">الاسم</th>
                                        <th scope="col" style="text-align: right;">الصورة</th>
                                        <th scope="col" style="text-align: right;">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center;" id="row-{{$item->id}}">
                                            <td><input onchange="checkbox({{$item->id}})" type="checkbox" id="{{$item->id}}"></td>
                                            <td>{{$item?->name}}</td>
                                            <td><img width="80" src="{{$item?->flag}}" alt=""></td>
                                            <th>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                       data-toggle="dropdown" aria-expanded="false"
                                                       style="color: #333; text-decoration: none;">... </a>
                                                    <div class="dropdown-menu">
                                                        <a href="/nationalities/delete/{{$item->id}}" class="dropdown-item"
                                                           style=" text-align: right;direction: ltr;">
                                                            <i class="fa-solid fa-trash-can"
                                                               style="margin-right: 54px;"></i>
                                                            حذف
                                                        </a>
                                                        <button type="button" class=" btn  " data-toggle="modal"
                                                                data-target="#edit-{{$loop->iteration}}"
                                                                style="border: none;">
                                                            تعديل <i class="fa-solid fa-pen"
                                                                     style="margin-right: 82px;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <div class="modal fade" id="edit-{{$loop->iteration}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <form method="post" id="edit-form-{{$loop->iteration}}" enctype="multipart/form-data"
                                                  action="/nationalities/update/{{$item->id}}" class="modal-dialog">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header" style="direction: rtl;">
                                                        <h5 class="modal-title " id="staticBackdropLabel">تعديل جنسية</h5>
                                                        <button type="button"
                                                                style="margin-left: 0; border: none; outline: none; background: none"
                                                                class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body fix-withe6"
                                                             style="text-align: -webkit-right;">
                                                            <div class="form-group">
                                                                <label
                                                                    style="text-align:right;font-size: 18px; color: #C4C4C4">
                                                                    الاسم
                                                                </label>
                                                                <input name="name" value="{{$item?->name}}" type="text"
                                                                       id="name" class="form-control"
                                                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                                            </div>
                                                            <div class="card-body" style="text-align: right;">
                                                                <div>
                                                                    <img src="{{ $item?->flag }}" alt="" width="179px" id="image" height="149px"><br>
                                                                    <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="file" class="inputfile" width="179px"
                                                                           height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                                    <label for="file" class="btn btn-info mt-2 "
                                                                           style="cursor: pointer; width:180px;height:40px">صورة العلم</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" style="justify-content: flex-start;">
                                                        <button type="reset" class="btn btn-white"
                                                                data-dismiss="modal"
                                                                style="border: 1px solid #333; width: 100px; height: 35px;">
                                                            إلغاء
                                                        </button>
                                                        <button type="submit" class="btn text-white "
                                                                style="background: #3CD6D5;width: 100px; height: 37px;  ">
                                                            حفظ
                                                        </button>
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
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <form method="post" action="/nationalities/store" class="modal-dialog" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header" style="direction: rtl;">
                                        <h5 class="modal-title " id="staticBackdropLabel">إضافة جنسية</h5>
                                        <button type="button"
                                                style="margin-left: 0; border: none; outline: none; background: none"
                                                class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body fix-withe6" style="text-align: -webkit-right;">
                                            <div class="form-group">
                                                <label style="text-align:right;font-size: 18px; color: #C4C4C4">
                                                    الاسم
                                                </label>
                                                <input name="name" type="text" id="name" class="form-control"
                                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                            </div>
                                            <div class="card-body" style="text-align: right;">
                                                <div>
                                                    <img src="" alt="" width="179px" id="image" height="149px"><br>
                                                    <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="file" class="inputfile" width="179px"
                                                           height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                    <label for="file" class="btn btn-info mt-2 "
                                                           style="cursor: pointer; width:180px;height:40px">صورة العلم</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="justify-content: flex-start;">
                                        <button type="reset" class="btn btn-white" data-dismiss="modal"
                                                style="border: 1px solid #333; width: 100px; height: 35px;">إلغاء
                                        </button>
                                        <button type="submit" class="btn text-white "
                                                style="background: #3CD6D5;width: 100px; height: 37px;  ">حفظ
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                $.post( "/nationalities/groupDelete", {ids: ids}).done(function() {
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
