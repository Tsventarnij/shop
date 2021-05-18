@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($category['id']) ? __('Edit category') : __('Add category') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ isset($category['id']) ? route('categoryUpdate', $category['id']) : route('categoryCreate') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($id))
                                <input id="prodId" name="id" type="hidden" value="{{$id}}">
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $category['title'] ?? '' }}" required autocomplete="name" autofocus>

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
                                    @if (isset($category['default_types']))
                                        <div>
                                            @foreach($category['default_types'] as $type)
                                                <div style="display: flex">
                                                    <input id="type-name" type="text" class="form-control" value="{{ $type['name'] }}" disabled>
                                                    <a class="btn btn-danger" href="{{route('defaultTypeDelete', [ 'id' => $category['id'], 'type_id' => $type['id']])}}">Delete</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                        <div class="row" style="margin: 10px">
                                            <a class="btn btn-info" href="#" onclick="event.preventDefault();
                                                const input = document.createElement('select');
                                                const typeDiv = document.getElementById('add-type');
                                                const optionData = {{$types}};
                                                const firstOption = document.createElement('option');
                                                firstOption.innerText = 'Choose type';
                                                firstOption.setAttribute('selected', true);
                                                firstOption.setAttribute('disabled', true);
                                                input.appendChild(firstOption);
                                                optionData.forEach(element => {
                                                    const option = document.createElement('option');
                                                    option.innerText = element.name;
                                                    option.setAttribute('value', element.id);
                                                    input.appendChild(option);
                                                });
                                                input.setAttribute('class', 'form-control');
                                                input.setAttribute('name', 'add_type[]');
                                                typeDiv.insertBefore(input, typeDiv.firstChild);">
                                                {{ __('Add type') }}
                                            </a>

                                            <a class="btn btn-info" href="#" onclick="event.preventDefault();
                                            const input = document.createElement('input');
                                            const mediaDiv = document.getElementById('add-type');
                                            input.setAttribute('class', 'form-control');
                                            input.setAttribute('name', 'new_type[]');
                                            mediaDiv.insertBefore(input, mediaDiv.firstChild);">
                                                {{ __('New type') }}
                                            </a>
                                        </div>
                                        <div id="add-type"></div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($category['id']) ? __('Edit category') : __('Add category') }}
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