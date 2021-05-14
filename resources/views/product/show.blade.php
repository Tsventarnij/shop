@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">

{{--                            <div id="mediaContent" class="carousel slide" data-touch="false" data-interval="false">--}}
{{--                                <div class="carousel-inner">--}}
                                    @foreach($medias as $index => $media)
{{--                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">--}}
                                            {!! $media !!}
{{--                                        </div>--}}
                                    @endforeach
{{--                                </div>--}}
{{--                                <a class="carousel-control-prev" href="#carouselExampleControlsNoTouching" role="button" data-slide="prev">--}}
{{--                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                                    <span class="sr-only">Previous</span>--}}
{{--                                </a>--}}
{{--                                <a class="carousel-control-next" href="#carouselExampleControlsNoTouching" role="button" data-slide="next">--}}
{{--                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                                    <span class="sr-only">Next</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-md-8">
                            <div>Title - {{$title}}</div>
                            <div>Description - {{$description}}</div>
                            <div>Price - {{$price}}</div>
                            <div>Seller - <a href="{{ route('companyShow', $company['id']) }}">{{$company['name']}}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
