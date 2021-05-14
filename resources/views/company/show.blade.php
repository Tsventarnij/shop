@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div>Name - {{$name}}</div>
                    <div>Description - {{$description}}</div>
                </div>
            </div>
        </div>
    </div>
    @include('product.list')
@endsection

