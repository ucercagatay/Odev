@extends('front.layouts.master')
@section('content')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <div class="user-profile">
                                        <div class="username-dt">
                                            <div class="usr-pic">
                                                <img src="{{asset(\Illuminate\Support\Facades\Auth::user()->image)}}" alt="">
                                            </div>
                                        </div><!--username-dt end-->
                                        <div class="user-specs">
                                            <h3>{{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
                                        </div>
                                    </div><!--user-profile end-->
                                    <ul class="user-fw-status">
                                        <li>
                                            <a id="edit_profile" href="#" title="">Profili Düzenle</a>
                                        </li>
                                    </ul>
                                </div><!--user-data end-->

                            </div><!--main-left-sidebar end-->
                        </div>


                            <div class="col-lg-6 col-md-8 no-pd">

                            <div class="main-ws-sec">
                                <div class="post-topbar">
                                    <div class="user-picy">
                                        <img src="{{asset(\Illuminate\Support\Facades\Auth::user()->image)}}" alt="">
                                    </div>
                                    <div class="post-st">
                                        <ul>
                                            <li><a class="post-jb active" href="#" title="">Gönderi Paylaş</a></li>
                                        </ul>
                                    </div><!--post-st end-->
                                </div><!--post-topbar end-->
                                @foreach($gonderiler as $gonderi)
                                <div class="posts-section">
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img width="10%" src="{{asset($gonderi->getUser->image)}}" alt="">
                                                <div class="usy-name">
                                                    <h3>{{$gonderi->getUser->name}}</h3>
                                                    <span><img src="images/clock.png" alt="">{{$gonderi->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="images/icon8.png" alt=""><span>{{$gonderi->getUser->sehir}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="job_descp">
                                            <p>{{$gonderi->icerik}}</p>
                                            @if(!is_null($gonderi->image))
                                                <img width="100%" src="{{asset($gonderi->image)}}" alt="">
                                                @endif
                                            <ul class="skill-tags">
                                                <li><a href="#" title="">{{$gonderi->getUser->getFakulte->adi}}</a></li>
                                                <li><a href="#" title="">{{$gonderi->getUser->getBolum->bolum_adi}}</a></li>
                                            </ul>
                                        </div>

                                    </div><!--post-bar end-->

                                </div><!--posts-section end-->
                                @endforeach
                            </div><!--main-ws-sec end-->

                        </div>


                        <div class="col-lg-3 pd-right-none no-pd">
                            <div class="right-sidebar">
                                <div class="widget widget-jobs">
                                    <div class="sd-title">
                                        <h3>Fakülteler</h3>
                                    </div>
                                    <div class="jobs-list">
                                        @foreach($fakulte as $f)
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <a href="{{route('fakulteler',$f->id)}}"> <h3>{{$f->adi}}</h3></a>
                                                </div>
                                            </div><!--job-info end-->
                                        @endforeach
                                    </div><!--jobs-list end-->
                                </div><!--widget-jobs end-->
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>




    <div class="post-popup job_post">
        <div class="post-project">
            <h3>Gönderi Oluştur</h3>
            <div class="post-project-fields">
                <form action="{{route('post_create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="" class="m-2">İçerik:*</label>
                            <textarea required name="description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label for="" class="m-2">Fotoğraf:</label>
                            <input type="file" name="image"> </input>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Paylaş</button></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div><!--post-project-fields end-->
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->




    </div><!--theme-layout end-->

    <div class="modal" id="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profili Güncelle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container px-5 my-5">
                        <form id="contactForm" action="{{route('update_profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="adiniz">Adınız</label>
                                <input class="form-control" name="name" id="adiniz" type="text" placeholder="Adınız" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="adiniz:required">Adınız is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="calistiginizYer">Çalıştığınız Yer</label>
                                <input class="form-control" name="calistigi_yer" id="calistiginizYer" type="text" placeholder="Çalıştığınız Yer" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="calistiginizYer:required">Çalıştığınız Yer is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="pozisyonunuz">Pozisyonunuz</label>
                                <input class="form-control" name="pozisyon" id="pozisyonunuz" type="text" placeholder="Pozisyonunuz" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="pozisyonunuz:required">Pozisyonunuz is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="medeniDurumunuz">Medeni Durumunuz</label>
                                <input class="form-control" name="medeni_durum" id="medeniDurumunuz" type="text" placeholder="Medeni Durumunuz" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="medeniDurumunuz:required">Medeni Durumunuz is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="telefonNumaraniz">Telefon Numaranız</label>
                                <input class="form-control" name="phone_number" id="telefonNumaraniz" type="text" placeholder="Telefon Numaranız" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="telefonNumaraniz:required">Telefon Numaranız is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="image">Fotoğrafınız</label>
                                <input class="form-control" name="image" id="image" type="file" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="image:required">İmage is required.</div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $('#edit_profile').click(function () {
            $.ajax({
                url: "{{route('mezun_info',\Illuminate\Support\Facades\Auth::id())}}",
                type: 'GET',
                success: function(res) {
                    $('#modal').modal("toggle");
                    $('#adiniz').val(res.name);
                    $('#calistiginizYer').val(res.calistigi_yer);
                    $('#pozisyonunuz').val(res.pozisyon);
                    $('#medeniDurumunuz').val(res.medeni_durumu);
                    $('#telefonNumaraniz').val(res.tel_no);

                }
            });

        })
    </script>
@endsection
