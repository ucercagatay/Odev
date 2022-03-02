
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WorkWise Html Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/')}}/css/responsive.css">

</head>


<body>


<div class="wrapper">



    <header>
        <div class="container">
            <div class="header-data">
                <div class="logo">
                    <a href="{{route('homepage')}}" title=""><img src="{{asset('logo')}}/logo1.png" width="300%" style="margin-left: -40px;" alt=""></a>
                </div><!--logo end-->
                <div style="    display: flex;
    justify-content: flex-end;
    align-items: center;">
                    <nav>
                        <ul>
                            <li>
                                <a href="{{route('homepage')}}" title="">
                                    <span><img src="images/icon1.png" alt=""></span>
                                    Anasayfa
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span><img src="images/icon2.png" alt=""></span>
                                    Fakülteler
                                </a>
                                <ul>
                                    @foreach($fakulte as $s)
                                        <li><a href="{{route('fakulteler',$s->id)}}" title="">{{$s->adi}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav><!--nav end-->
                    <div class="user-account" style="width: 10%;!important;">
                        <div class="user-info">
                            <img width="50%" src="{{asset(\Illuminate\Support\Facades\Auth::user()->image)}}" alt="">
                        </div>
                        <div class="user-account-settingss">

                            <h3 class="tc"><a href="{{route('logoutt')}}" title="">Çıkıs</a></h3>
                        </div><!--user-account-settingss end-->
                    </div>
                </div>

                <div class="menu-btn">
                    <a href="{{asset('frontend/')}}/#" title=""><i class="fa fa-bars"></i></a>
                </div><!--menu-btn end-->

            </div><!--header-data end-->
        </div>
    </header><!--header end-->
