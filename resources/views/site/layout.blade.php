<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from twnty2.co/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 13:21:23 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    @include('site.include.head')
    <style>
        .main-menu-wrapper {
            z-index: 999;
        }

        .sidebar-overlay {
            z-index: 0;
        }

        .fix-div-1 {
            margin-right: 20px;
        }
    </style>

</head>

<body class="account-page">
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        @include('site.include.header')
        <!-- /Header -->

        <!-- Page Content -->
      @yield('content')
        <!-- /Page Content -->
        <!-- Footer -->
        @include('site.include.footer')
        <!-- /Footer -->
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    @include('site.include.script')
</body>

<!-- Mirrored from twnty2.co/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 13:21:59 GMT -->

</html>
