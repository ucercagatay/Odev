@extends('front.layouts.master')
@section('content')
    <section class="companies-info">
        <div class="container">
            <div class="company-title">
                <h3>{{$fakulte_single->adi}}</h3>
            </div><!--company-title end-->
            <div class="companies-list">
                <div class="row">
                    @foreach($bolum as $bol)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="company_profile_info">
                                <div class="company-up-info">
                                    <img src="{{asset('logo')}}/logo1.png" width="90%" alt="">
                                    <h3>{{$bol->bolum_adi}}</h3>
                                </div>
                                <a href="{{route('mezunlar',$bol->id)}}" title="" class="view-more-pro">Mezunları Gör</a>
                            </div><!--company_profile_info end-->
                        </div>
                    @endforeach

                </div>
            </div><!--companies-list end-->
        </div>
    </section><!--companies-info end-->
@endsection
