@extends('dashboard.layout')
@section('menu_4_item_1', 'active')
@section('content')
    <div class="page-wrapper" style="background:#E5E5E5 ; height: 150%;">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">
                        <a href="/leaders">الكابتن</a> <i class="fa-solid fa-angle-left mt-2 ml-2"> </i><a href="">تعديل
                            كابتن</a></h3>
                </div>
            </div>
        </div>
        <div class="row " style="text-align: right;">
            <div class="content1 col-sm-12">
                <form action="/leaders/update/{{$item->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title" style="color:#3CD6D5">تعديل كابتن</h5></div>
                        <div class="card-body">
                            <div id="map" style="height: 225px"></div>
                            <div class="row g-2 d-flex" style="margin-bottom: 13px;width: 100%;">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <label style="text-align:right;font-size: 12px; color: #C4C4C4">latitude </label>
                                        <input value="{{$item?->latitude}}" name="latitude" type="number" class="form-control" id="floatingInputGrid"
                                               placeholder="latitude"
                                               style="text-align: right;border: 0; border-bottom: 1px solid #C4C4C4;">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <label style="text-align:right;font-size: 12px; color: #C4C4C4"> longitude</label>
                                        <input value="{{$item?->longitude}}" name="longitude" type="number" class="form-control" id="floatingInputGrid"
                                               placeholder="longitude"
                                               style="text-align: right;border: 0; border-bottom: 1px solid #C4C4C4;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4">إسم الكابتن</label>
                                <input value="{{$item?->name}}" name="name" type="text" id="name" class="form-control" placeholder="اسم الكابتن "
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4">رقم الجوال </label>
                                <input value="{{$item?->phone}}" name="phone" type="text" id="number" class="form-control" placeholder="رقم الجوال "
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="form-group">
                                <label style="text-align:right;font-size: 12px; color: #C4C4C4">البريد الإلكتروني </label>
                                <input value="{{$item?->email}}" name="email" type="email" id="email" class="form-control"
                                       placeholder=" البريد الالكتروني"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="row g-2 d-flex" style="margin-bottom: 13px;width: 100%;">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <label style="text-align:right;font-size: 12px; color: #C4C4C4">رقم الهوية </label>
                                        <div>
                                            <input value="{{$item?->info?->id_number}}" name="id_number" type="text" id="id_number" class="form-control"
                                                   placeholder="رقم الهوية"
                                                   style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input value="{{$item?->info?->nationality}}" type="text" name="nationality" id="nationality" class="form-control"
                                       placeholder="الجنسية"
                                       style="text-align: right; border: 0; border-bottom: 1px solid #C4C4C4;">
                            </div>
                            <div class="row g-2 d-flex" style="margin-bottom: 13px; width: 100%;">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <label style="text-align:right;font-size: 12px; color: #C4C4C4">البنك </label>
                                        <div>
                                            <select name="bank_id" class="select "
                                                    style="padding: 10px;width: 100%;text-align: right;border: 0 ; border-bottom: 1px solid #C4C4C4; outline: none;">
                                                @forelse($banks as $bank)
                                                    <option {{ $item?->bank_id == $bank->id? 'selected' : '' }} value="{{ $bank->id }}">{{ $bank?->name }}</option>
                                                @empty
                                                    <option selected>لن يتم القبول، يرجى اضافة بنك على الاقل</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex text-center">
                                <div class="col-sm-6">
                                    <div class="card" style="border: 0;">
                                        <div class="card-body">
                                            <div>
                                                <img src="/assets/img/avatar-03.jpg" id="image_1" alt="" width="179px"
                                                     height="149px"><br>
                                                <input
                                                    onchange="document.getElementById('image_1').src = window.URL.createObjectURL(this.files[0])"
                                                    type="file" name="image_1" id="file_1" class="inputfile" width="179px"
                                                    height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="file_1" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">صورة الهوية</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card" style="border: 0;">
                                        <div class="card-body" style="border: 0;">
                                            <div>
                                                <img src="/assets/img/avatar-03.jpg" id="image_2" alt="" width="179px"
                                                     height="149px"><br>
                                                <input
                                                    onchange="document.getElementById('image_2').src = window.URL.createObjectURL(this.files[0])"
                                                    type="file" name="image_2" id="file_2" class="inputfile" width="179px"
                                                    height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="file_2" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">
                                                    صورة رخصة القيادة
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex text-center">
                                <div class="col-sm-6">
                                    <div class="card" style="border: 0;">
                                        <div class="card-body">
                                            <div>
                                                <img src="/assets/img/avatar-03.jpg" id="image_3" alt="" width="179px"
                                                     height="149px"><br>
                                                <input
                                                    onchange="document.getElementById('image_3').src = window.URL.createObjectURL(this.files[0])"
                                                    type="file" name="image_3" id="file_3" class="inputfile" width="179px"
                                                    height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="file_3" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">
                                                    الصورة من الخلف
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card" style="border: 0;">
                                        <div class="card-body">
                                            <div>
                                                <img src="/assets/img/avatar-03.jpg" id="image_4" alt="" width="179px"
                                                     height="149px"><br>
                                                <input
                                                    onchange="document.getElementById('image_4').src = window.URL.createObjectURL(this.files[0])"
                                                    type="file" name="image_4" id="file_4" class="inputfile" width="179px"
                                                    height="149px" style="width: 0.1px;
														height: 0.1px;
														opacity: 0;
														overflow: hidden;
														position: absolute;
														z-index: -1;"/>
                                                <label for="file_4" class="btn btn-info mt-2 "
                                                       style="cursor: pointer; width:180px;height:40px">رخصة المركبة</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="padding: 20px 10px;">
                            <button type="submit" class="btn w-100" style="background:#13C27E; color:white;">حفظ</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
        defer
    ></script>
    <script>
        let map;

        function initMap() {
            const mapOptions = {
                zoom: 8,
                center: { lat: -34.397, lng: 150.644 },
            };

            map = new google.maps.Map(document.getElementById("map"), mapOptions);

            const marker = new google.maps.Marker({
                // The below line is equivalent to writing:
                // position: new google.maps.LatLng(-34.397, 150.644)
                position: { lat: -34.397, lng: 150.644 },
                map: map,
            });
            // You can use a LatLng literal in place of a google.maps.LatLng object when
            // creating the Marker object. Once the Marker object is instantiated, its
            // position will be available as a google.maps.LatLng object. In this case,
            // we retrieve the marker's position using the
            // google.maps.LatLng.getPosition() method.
            const infowindow = new google.maps.InfoWindow({
                content: "<p>Marker Location:" + marker.getPosition() + "</p>",
            });

            google.maps.event.addListener(marker, "click", () => {
                infowindow.open(map, marker);
            });
        }

        window.initMap = initMap;

    </script>
@endsection
