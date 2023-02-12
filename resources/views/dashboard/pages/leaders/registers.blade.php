@extends('dashboard.layout')
@section('menu_4_item_2', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;"><a href="/leaders">الكابتن</a></h3>
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
                                        <th scope="col">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                        <tr style="text-align: center;" id="row-{{$item->id}}">
                                            <td><input onchange="checkbox({{$item->id}})" type="checkbox" id="{{$item->id}}"></td>
                                            <td><img src="{{ $item?->avatar }}" width="30" height="30" alt=""></td>
                                            <td>{{ $item?->name }}</td>
                                            <td>{{ $item?->phone }}</td>
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
                                                        <a class="dropdown-item" href="/leaders/toggle_active/{{$item->id}}/2">قبول
                                                            <i
                                                                class="fa-solid fa-eye "
                                                                style="margin-right: 67px;"></i></a>
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
