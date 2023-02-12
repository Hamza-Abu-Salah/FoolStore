@extends('dashboard.layout')
@section('menu_4_item_1', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="">الكابتن</a></h3>
                </div>
                <div class="content1 content container-fluid " style="padding-bottom: 40px; background: #E5E5E5;">

                    <div class="buttons">
                        <div class="bg-white">
                            <div class="btn1 d-flex justify-content-between">
                                <div class="dived" style=" margin:8px 70px 12px 15px">
                                    <div class="d-flex fix-buttonss2  dived" style=" margin:8px 70px 12px 15px">
                                        <div class="p-1 dropdown btn-move">
                                            <a class="text-white dropdown-toggle mt-2" href="#" role="button"
                                               data-toggle="dropdown" aria-expanded="false"
                                               style="text-decoration: none;">
                                                <i class="fa-solid fa-file-export" style="font-size:12px"></i> تصدير
                                            </a>
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
                                <div class="btn2 d-flex">
                                    <div class="dived1 dix-h3" style="margin:17px 70px 12px 15px">
                                        <button type="button" class="btn text-white btn-red ">حذف متعدد<i
                                                class="fa-solid fa-trash-can" style="margin-left: 8px;"></i></button>
                                        <a href="/leaders/create">
                                            <button type="button" class="btn text-white btn-green">إضافة كابتن<i
                                                    class="fa-solid fa-plus" style="margin-left: 8px;"></i></button>
                                        </a>
                                    </div>
                                    <!-- <i class="fa-solid fa-plus"></i> -->
                                    <div class="d-flex dix-h4" style="margin:16px 22px 15px 10px">
                                        <h5 style="font-size:18px;color: #3CD6D5;">الكابتن</h5>
                                        <i class="fa-solid fa-list-ul " width="20" height="18"
                                           style="margin-top: 3px; margin-left:5px ;color: #3CD6D5;"></i>
                                    </div>

                                </div>
                                <!-- <i class="fa-solid fa-list-ul"></i> -->


                            </div>
                            <hr style="margin: 0; color: #C4C4C4;">


                            <div class="table-flex table-responsive" style="width: 100%;">

                                <table id="example" class="table-inline1 table table-striped table-bordered"
                                       style="width:100%">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col" data-orderable="false"><input onchange="checkbox(0)" type="checkbox" id="0"></th>
                                        <th scope="col">الصورة</th>
                                        <th scope="col">الإسم</th>
                                        <th scope="col"> رقم الهاتف</th>
                                        <th scope="col">الحالة</th>
                                        <th scope="col">اولوية الطلبات</th>
                                        <th scope="col">الطلبات</th>
                                        <th scope="col">التقييم</th>
                                        <th scope="col">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center;" id="row-{{$item->id}}">
                                            <td><input onchange="checkbox({{$item->id}})" type="checkbox" id="{{$item->id}}"></td>
                                            <td><img src="/uploads/captain/required_documents/{{ $item?->docs?->id_image }}" width="30" height="30" alt=""></td>
                                            <td>{{ $item?->name }}</td>
                                            <td>{{ $item?->phone }}</td>
                                            <th>
                                                @if($item->status == 1)
                                                    <a href="/leaders/toggle_active/{{$item->id}}/1" class="btn text-white"
                                                            style="font-size: 12px;background: #4FE39C">نشط <i
                                                            class="fa-solid fa-check"></i>
                                                    </a>
                                                @elseif($item->status == 2)
                                                    <a href="/leaders/toggle_active/{{$item->id}}/2" class="btn text-white"
                                                       style="font-size: 12px;background: #DC4267">مرفوض <i
                                                            class="fa-solid fa-times"></i>
                                                    </a>
                                                @else
                                                    <a href="/leaders/toggle_active/{{$item->id}}/0" class="btn text-white btn-warning"
                                                            style="font-size: 12px">غير نشط <i
                                                            class="fa-solid fa-ban"></i>
                                                    </a>
                                                @endif
                                            </th>
                                            <th>
                                                @if($item->has_priority)
                                                    <a href="/leaders/toggle_priority/{{$item->id}}" class="btn text-white"
                                                            style="font-size: 12px;background: #DC4267">لديه اولوية <i
                                                            class="fa-solid fa-xmark"></i>
                                                    </a>
                                                @else
                                                    <a href="/leaders/toggle_priority/{{$item->id}}" class="btn text-white"
                                                            style="font-size: 12px;background: #919FAA">لا <i
                                                            class="fa-solid fa-xmark"></i>
                                                    </a>
                                                @endif
                                            </th>
                                            <td>
                                                {{ $item->captain_orders_count }}
                                            </td>
                                            <td>
                                                @for($i = 0; $i < $item->rate; $i++)
                                                    <i class="fe fe-star text-warning"></i>
                                                @endfor
                                                @for($i = 0; $i < (5-$item->rate); $i++)
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                @endfor
                                            </td>

                                            <th>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                       data-toggle="dropdown" aria-expanded="false"
                                                       style="color: #333; text-decoration: none;">... </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="/leaders/delete/{{$item->id}}"
                                                           style=" text-align: right; direction: ltr;">
                                                            <i class="fa-solid fa-trash-can"
                                                               style="margin-right: 54px;"></i>
                                                            حذف
                                                        </a>
                                                        <a class="dropdown-item" href="/leaders/edit/{{$item->id}}">تعديل <i
                                                                class="fa-solid fa-pen" style="margin-right: 67px;"></i></a>
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
                $.post( "/leaders/groupDelete", {ids: ids}).done(function() {
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
