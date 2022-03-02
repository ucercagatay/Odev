
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WorkWise Html Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/responsive.css">
</head>


<body class="sign-in">


<div class="wrapper">


    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo">
                                <img src="{{asset('logo')}}/logo2.png" width="80%" alt="">
                                <p>Fırat Üniversitesi Mezun Bilgi Platformu</p>
                            </div><!--cm-logo end-->
                            <img src="{{asset('frontend')}}/images/cm-main-img.png" alt="">
                        </div><!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <ul class="sign-control">
                                <li data-tab="tab-1" class="current"><a href="{{asset('frontend')}}/#" title="">Giriş Yap</a></li>
                                <li data-tab="tab-2"><a href="{{asset('frontend')}}/#" title="">Kayıt Ol</a></li>
                            </ul>
                            <div class="sign_in_sec current" id="tab-1">

                                <h3>Giriş Yap</h3>
                                <form action="{{route('loginn')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="text" name="email" placeholder="Email">
                                                <i class="la la-user"></i>
                                            </div><!--sn-field end-->
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" name="password" placeholder="Şifre">
                                                <i class="la la-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" value="submit">Giriş Yap</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!--sign_in_sec end-->
                            <div class="sign_in_sec" id="tab-2">
                                <div class="dff-tab current" id="tab-3">
                                    <h3>Kayıt Ol</h3>
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input required type="text" name="name" placeholder="Ad Soyad">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input required type="text" name="email" placeholder="Email">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input required type="text" name="country" placeholder="Şehir">
                                                    <i class="la la-globe"></i>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <select required name="fakulte" id="select_faculty">
                                                        <option class="" value="">Fakülte Seçiniz</option>
                                                        @foreach($fakulte as $f)
                                                            <option id="{{$f->id}}" value="{{$f->id}}">{{$f->adi}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="la la-dropbox"></i>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <select name="bolum" required id="select_field">
                                                        @foreach($bolum as $b)
                                                            <option class="{{$b->fakulte_id}}" value="{{$b->id}}">{{$b->bolum_adi}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="la la-dropbox"></i>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="number" name="tc_no" required  placeholder="Tc No">
                                                    <i class="la la-globe"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="number" name="graduated_date" required placeholder="Mezuniyet Yılı">
                                                    <i class="la la-globe"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="company"  placeholder="Çalıştığınız Yer">
                                                    <i class="la la-globe"></i>
                                                </div>
                                            </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="position" placeholder="Pozisyon">
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="medeni_hal" placeholder="Medeni Durum">
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="tel" name="phone_number" required placeholder="Tel No">
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="password" required placeholder="Şifre">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <label for="">Fotoğraf</label>
                                                    <input type="file" name="image" required placeholder="Fotoğraf">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Kayıt Ol</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--dff-tab end-->
                                <div class="dff-tab" id="tab-4">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="company-name" placeholder="Company Name">
                                                    <i class="la la-building"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="country" placeholder="Country">
                                                    <i class="la la-globe"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="password" placeholder="Password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="repeat-password" placeholder="Repeat Password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec st2">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="cc" id="c3">
                                                        <label for="c3">
                                                            <span></span>
                                                        </label>
                                                        <small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
                                                    </div><!--fgt-sec end-->
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Get Started</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--dff-tab end-->
                            </div>
                        </div><!--login-sec end-->
                    </div>
                </div>
            </div><!--signin-pop end-->
        </div><!--signin-popup end-->

    </div><!--sign-in-page end-->


</div><!--theme-layout end-->



<script type="text/javascript" src="{{asset('frontend')}}/js/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/popper.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/lib/slick/slick.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/script.js"></script>
<script>
    $('#select_faculty').change(function (){
        var fakulte_id = $(this).find(":selected").attr("id");
        var bolum = $('#select_field').children();
        bolum.each(function (index){
            if(bolum[index].getAttribute('class') !== fakulte_id){
               bolum[index].style = "display:none";
            }
            else {
                bolum[index].style = "";
            }
        })
    })
</script>
</body>
</html>
