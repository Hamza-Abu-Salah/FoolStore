<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8" />
        <title>الرئيسية</title>
        @php
        $rtl = app()->getLocale() === 'ar'? '_rtl' : '';
        @endphp

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

        <!-- Favicons -->
        <link href="{{asset('site/assets/img/favicon.png')}}" rel="icon" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('site/assets/plugins/bootstrap-rtl/css/bootstrap.min.css')}}" />
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('site/assets/plugins/fontawesome/css/fontawesome.min.css')}}" />
        <link rel="stylesheet" href="{{asset('site/assets/plugins/fontawesome/css/all.min.css')}}" />

        <!-- Main CSS -->

        <link href="/site/assets/css/style{{$rtl}}.css" rel="stylesheet" type="text/css"/>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.4/css/flag-icons.min.css" integrity="sha512-uvXdJud8WaOlQFjlz9B15Yy2Au/bMAvz79F7Xa6OakCl2jvQPdHD0hb3dEqZRdSwG4/sknePXlE7GiarwA/9Wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        @stack('style')

	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="">

            @php
            $lang = app()->getLocale() === 'ar'? 'ar' : 'en';
            @endphp

			<div class="container">
				<div>
					<div style=" margin-top:100px">
                        <h4 style="font-size: 24px; text-align: center;font-weight: 700 !important;">


                            {{__('messages.conditions')}}
                        </h4>

                        <p class="lead" style=" margin-bottom:80px">
                           @if ($lang == 'ar')
                           {{ $sitting?->usage_policy_ar}}
                           @else
                           {{ $sitting?->usage_policy_en}}

                           @endif

                        </p>
					</div>



				</div>


			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/plugins/bootstrap-rtl/js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="assets/js/scroll.js"></script>


	</body>
</html>
