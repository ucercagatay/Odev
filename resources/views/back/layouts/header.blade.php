<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="{{asset('backend/dist/')}}/https://fonts.gstatic.com">
    <link href="{{asset('backend/dist/')}}/https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/dist/')}}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{asset('backend/dist/')}}/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{asset('backend/dist/')}}/assets/vendors/simple-datatables/style.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('backend/dist/')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{asset('backend/dist/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('backend/dist/')}}/assets/css/app.css">
    <link rel="shortcut icon" href="{{asset('backend/dist/')}}/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <h1>Panel</h1>
                    </div>
                    <div class="toggler">
                        <a href="{{asset('backend/dist/')}}/#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menü</li>



                    <li class="sidebar-item active ">
                        <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                            <i class="bi"></i>
                            <span>Kullanıcı Onayı</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('logoutt')}}" class='sidebar-link'>
                            <i class="bi"></i>
                            <span>Çıkış Yap</span>
                        </a>
                    </li>

                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="{{asset('backend/dist/')}}/#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Admin Paneli</h3>
        </div>





