@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($id) ? __('Edit category') : __('Add category') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ isset($id) ? route('categoryUpdate', $id) : route('categoryCreate') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($id))
                                <input id="prodId" name="id" type="hidden" value="{{$id}}">
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $title ?? '' }}" required autocomplete="name" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="media" class="col-md-4 col-form-label text-md-right">{{ __('Default types') }}</label>

                                <div class="col-md-6">
                                    @if (isset($types))
                                        <div>
                                            @foreach($types as $id => $type)
                                                <div style="margin: 10px">
                                                    <input id="type-name" type="text" class="form-control @error('title') is-invalid @enderror" name="type[{{$id}}]" value="{{ $type }}" required autocomplete="name" autofocus>
                                                    <a class="btn btn-danger" href="{{route('defaultTypeDelete', $id)}}">Delete</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div id="new-type"></div>
                                    <a class="btn btn-info" href="#" onclick="event.preventDefault();
                                            const input = document.createElement('select');
                                            const mediaDiv = document.getElementById('new-type');
                                            input.setAttribute('class', 'selectpicker');
                                            input.setAttribute('name', 'new_type[]');
                                            mediaDiv.insertBefore(input, mediaDiv.firstChild);">
                                        {{ __('Add type') }}
                                    </a>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($id) ? __('Edit product') : __('Add product') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-lg-6">--}}
{{--            <h2>Select Sample #1</h2>--}}
{{--            <select class="selectpicker" id="select1">--}}
{{--                <option>Mustard</option>--}}
{{--                <option>Ketchup</option>--}}
{{--                <option>Relish</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6">--}}
{{--            <h2>Select Sample #2</h2>--}}
{{--            <select class="selectpicker" id="select2">--}}
{{--                <option>Banana</option>--}}
{{--                <option>Peach</option>--}}
{{--                <option>Orange</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection