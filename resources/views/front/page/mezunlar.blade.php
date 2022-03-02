@extends('front.layouts.master')
@section('content')
    <section class="companies-info">
        <div class="container">
            <div class="company-title">
                <h3>{{$bolum_single->bolum_adi}}</h3>
            </div><!--company-title end-->
            <a href="https://10fastfingers.com/typing-test/turkish"><img src="http://img.10fastfingers.com/badge/typing-test_7_CQ.png" alt="Typing Test" /></a><p>Visit the <a href="https://10fastfingers.com/typing-test/turkish">Typing Test</a> and try!</p>
            <div class="companies-list">
                <div class="row">
                    @foreach($mezunlar as $mezun)
                        <div id="deneme" class="col-lg-3 col-md-4  col-sm-6">
                            <div class="company_profile_info">
                                <div class="company-up-info">
                                    <img src="{{asset($mezun->image)}}" width="10vh" height="10vh" alt="">
                                    <h3>{{$mezun->name}}</h3>
                                </div>
                                <button id="button" value="{{$mezun->id}}" href="#" title="" class="post-jb active">Mezun Detayını Gör</button>
                            </div><!--company_profile_info end-->
                        </div>
                    @endforeach
                </div>
            </div><!--companies-list end-->

        </div>

    </section><!--companies-info end-->
    <div id="Modal" tabindex="-1" style="z-index: 11111" class="post-popup job_post">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Mezun Detayı</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">

                    <div class="row">
                        <div class="col-3 text-center">
                            <img id="mezun_image" src="" alt="Michal Szymanski - founder of Material Design for Bootstrap" class="img-fluid z-depth-1-half rounded-circle">
                            <div style="height: 10px"></div>
                            <p class="title mb-0"></p>
                        </div>

                        <div class="col-9">
                            <p id="mezun_adi"><b>Adı: </b></p>
                            <p id="mezun_yer"><b>Çalıştığı Yer: </b></p>
                            <p id="mezun_poz"><b>Pozisyon: </b></p>
                            <p id="mezun_med"><b>Medeni Durumu: </b></p>
                            <p id="mezun_mezunyil"><b>Mezuniyet Yılı: </b></p>
                        </div>
                    </div>


                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button id="close_button" type="button" class="btn btn-secondary" data-bs-dismiss="Modal">Kapat</button>

                </div>
            </div>
            <!--/.Content-->
    </div><!--post-project-popup end-->
@endsection
@section('js')
    <script>
        document.getElementById('button').onclick = function(){
            const id = this.getAttribute('value');
            $.ajax({
                url: "{{route('mezun_info',0)}}"+id,
                type: 'GET',
                success: function(res) {
                    $('#mezun_adi').append(res.name);
                    $('#mezun_yer').append(res.calistigi_yer);
                    $('#mezun_poz').append(res.pozisyon);
                    $('#mezun_med').append(res.medeni_durumu);
                    $('#mezun_mezunyil').append(res.mezuniyet_yili);
                    document.getElementById("mezun_image").src= document.location.origin+'/'+res.image;
                }
            });
        };
        document.getElementById('close_button').onclick = function (){

        }

    </script>

{{--    <script>--}}
{{--        function selam(id){--}}
{{--            alert(id)--}}
{{--            const array = {{$mezunlar}};--}}
{{--            console.log(array)--}}
{{--            alert( )--}}
{{--            $('#Modal').modal();--}}

{{--        }--}}
{{--    </script>--}}
@endsection
