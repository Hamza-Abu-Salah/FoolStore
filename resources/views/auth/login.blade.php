
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/css/style1.css">
    <style>

        .Sidebar->ul>lid {
            right: 0;
            left: auto;
            color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<main class="form-signin w-100 m-auto">
    <form class="text-center" method="post" action="/login">
        @csrf
        <img class="mb-4" src="/assets/img/logo.png" alt=""  height="90">

        <div  class="login">
            <h1 >تسجيل دخول</h1>
            <div class="form-floating" style="margin-bottom: 20px;text-align: right;">
                <input type="email" name="email" class="form-control"  style="text-align: right; height: 55px; " placeholder="البريد الالكتروني/اسم المستخدم">
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" style="text-align: right; height: 55px;"  placeholder="كلمة المرور">
            </div>
            <div class="d-flex just  justify-content-between">
                <a href="#" class="url"> نسيت كلمة المرور؟</a>
                <button class="btn  text-white " type="submit" style="height: 45px;margin-top: 30px; background: #3CD6D5;" >تسجيل دخول</button>
            </div>
        </div>
        <p class="mt-5 mb-3 text-muted " style="color: #5B5B5B;">  جميع الحقوق محفوظة Twnty2 &copy; </p>

    </form>
</main>



<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>
