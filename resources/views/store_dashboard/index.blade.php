@extends('store_dashboard.layout')
@section('menu_1', 'active')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title" style="padding-right: 32px;">الرئيسية</h3>
                </div>
            </div>
        </div>
        <br>
        @if(session('warning'))
            <span class="badge badge-warning" style="float: right;">
                                    {{ session('warning') }}
                                </span>
        @endif
        <div class="content1 content container-fluid" style="background:#E5E5E5 ;">
            <div class="row" style="margin-right: 15px; display: flex;">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card" >
                        <div class="card-body" style="background: #369FFF;
								height: 108px;">
                            <div class="dash-widget-header">
                                <div class="dash-count">
                                    <h3>الأقسام</h3>
                                </div>
                                <span class="dash-widget-icon text-success">
											<i class="fa-solid fa-list-ul" style="color: #369FFF;"></i>
										</span>

                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted" style="color: #fff !important; ">{{ \App\Models\ProductCategory::where('store_id', auth('store')->id())->count() }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <i class="fa-solid fa-steering-wheel"></i> -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body" style="background: #FF993A;
								height: 108px;">
                            <div class="dash-widget-header">
                                <div class="dash-count">
                                    <h3>الطلبات</h3>
                                </div>
                                <!-- <i class="fa-regular fa-steering-wheel"></i>-->
                                <span class="dash-widget-icon text-danger border-danger">
											<i class="fa-regular fa-steering-wheel" style="color: #FF993A;"></i>
										</span>

                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted" style="color: #fff !important; ">{{ \App\Models\Order::where('store_id', auth('store')->id())->count() }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="fix-withe6 card-body" style="background: #8AC53E;
								height: 108px;">
                            <div class="dash-widget-header">
                                <div class="dash-count">
                                    <h3>المنتجات</h3>
                                </div>
                                <span class="dash-widget-icon text-warning border-warning">
											<i class="fa-solid fa-store" style="color: #8AC53E;"></i>
										</span>

                            </div>
                            <div class="dash-widget-info ">
                                <h6 class="text-muted " style="color: #fff !important; " >{{ \App\Models\Product::where('store_id', auth('store')->id())->count() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="fix-withe6 card-body" style="background: #8AC53E;
								height: 108px;">
                            <div class="dash-widget-header">
                                <div class="dash-count">
                                    <h3>المنتجات المقبولة</h3>
                                </div>
                                <span class="dash-widget-icon text-warning border-warning">
											<i class="fa-solid fa-store" style="color: #8AC53E;"></i>
										</span>

                            </div>
                            <div class="dash-widget-info ">
                                <h6 class="text-muted " style="color: #fff !important; " >{{ \App\Models\Product::where('store_id', auth('store')->id())->where('is_accept', 1)->count() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-12 col-lg-6">

                    <!-- Sales Chart -->
                    <div class="card card-table ">
                        <div class="card-header" style="text-align: right;" >
                            <h4 class="card-title" style="font-size:18px;color: #3CD6D5;">أخر 4 طلبات
                                <i class="fa-solid fa-list-ul" style="margin-top: 3px; margin-left:5px ;color: #3CD6D5; " ></i></h4>
                        </div>
                        <div class="card-body" style="width: 91%;">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100% ; font-size: 12px;">
                                    <thead>
                                    <tr class="text-dark">
                                        <th> تاريخ الطلب</th>
                                        <th> الحالة</th>
                                        <th>إجمالي التكلفة</th>
                                        <th>إسم العميل</th>
                                        <th>رقم الطلب</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Models\Order::where('store_id', auth('store')->id())->orderBy('id', 'desc')->take(4)->get() as $order)
                                        <tr>
                                            <td>{{ $order?->created_at->format('d-m-Y') }} </td>
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
                                            <td>{{ $order?->price }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>#{{ $order->id }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Sales Chart -->

                </div>
                <div class="col-md-12 col-lg-6">

                    <!-- Invoice Chart -->
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title" style="font-size:18px;color: #3CD6D5; text-align: right;"> الطلبات أخر 7 ايام</h4>
                        </div>
                        <div class="card-body">
                            <canvas class="col-lg-12" id="line" height="4"></canvas>
                        </div>
                    </div>
                    <!-- /Invoice Chart -->

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const ctxxx = document.getElementById('line').getContext('2d');
        const myCharttt = new Chart(ctxxx, {
            type: 'line',
            data: {
                labels: ['الموصلة', 'في الانتظار', 'الملغية', 'الملغية بسبب التأخير'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ \App\Models\Order::where('store_id', auth('store')->id())->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('status', '2')->count() }}, {{ \App\Models\Order::where('store_id', auth('store')->id())->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('status', '1')->count() }}, {{ \App\Models\Order::where('store_id', auth('store')->id())->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('status', '0')->count() }}, {{ \App\Models\Order::where('store_id', auth('store')->id())->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('status', '3')->count()}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    pointStyle: 'triangle'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const ctxx = document.getElementById('line1').getContext('2d');
        const myChartt = new Chart(ctxx, {
            type: 'line',
            data: {
                labels: ['المحظور', 'المفعل'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{\App\Models\User::where('is_captain', 1)->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('status', 0)->count()}}, {{ \App\Models\User::where('is_captain', 1)->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('status', 1)->count() }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    pointStyle: 'triangle'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
