<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/all.min.css">


    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="/assets/css/feathericon.min.css">

    <link rel="stylesheet" href="/assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap1.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap5.min.css">

    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.min.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
        th {
            text-align: right !important;
        }

        .fade:not(.show) {
            display: none
        }

        a {
            text-decoration: none;
        }

        table {
            direction: rtl
        }
    </style>
    <style>
        @media only screen and (max-width: 991.98px) {
            .social {
                display: block !important;
                text-align: center;
            }
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
@include('dashboard.include.header')
<!-- /Header -->

    <!-- Sidebar -->
@include('dashboard.include.sidebar')
<!-- /Sidebar -->

    <!-- Page Wrapper -->
    @yield('content')
</div>

<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="/assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="/assets/js/chart.morris.js"></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<!-- Custom JS -->
@yield('scripts')
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="/assets/export.js"></script>
<script>
    $('#pdf').on('click', function () {
        $("#example").tableHTMLExport({type: 'pdf', filename: 'sample.pdf'});
    })
</script>
<script src="/assets/js/script.js" defer></script>
<script>
    function printData() {
        var divToPrint = document.getElementById("example");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
        printData();
    }
</script>
</body>
</html>
