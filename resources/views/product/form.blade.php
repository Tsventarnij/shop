@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($id) ? __('Edit Product') : __('Add Product') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ isset($id) ? route('productUpdate', $id) : route('productCreate') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($id))
                                <input id="prodId" name="id" type="hidden" value="{{$id}}">
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $title ?? '' }}" required autocomplete="name" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-8">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $description ?? '' }}" autofocus>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-8">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $price ?? '' }}" autofocus>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-3 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-8">
                                    <div class="selectWrapper">
                                    <select id="category" name="category_id" class="form-select" aria-label="Default select example">
                                        @if(empty(old('category_id')))
                                            <option value="" selected disabled hidden>{{ __('Choose category') }}</option>
                                        @endif
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}"
                                                @if($category['id'] == (old('category_id') ?? $category_id ?? ''))
                                                selected
                                                @endif
                                            >{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="media" class="col-md-3 col-form-label text-md-right">{{ __('Media') }}</label>
                                <div class="col-md-8">
                                    <a class="btn btn-info" href="#" onclick="
                                    event.preventDefault();
                                    const input = document.createElement('input');
                                    const mediaDiv = document.getElementById('new-media');
                                    input.setAttribute('type', 'file');
                                    input.setAttribute('name', 'media[]');
                                    input.setAttribute('accept', 'image/png, image/jpeg, video/mp4');
                                    mediaDiv.insertBefore(input, mediaDiv.firstChild);">{{ __('Add Media') }}</a>
                                    <div id="new-media"></div>
                                    @if (isset($medias))
                                        <div>
                                            @foreach($medias as $id => $media)
                                                <div style="margin: 10px">
                                                    {!! $media !!}
                                                    <a class="btn btn-danger" href="{{route('mediaDelete', $id)}}">Delete</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="media" class="col-md-3 col-form-label text-md-right">{{ __('Types') }}</label>
                                <div class="col-md-8">
                                    <div id="default-type"></div>

                                    <a class="btn btn-info" href="" onclick="event.preventDefault();
                                            const select = document.createElement('select');
                                            const input = document.createElement('input');
                                            const inputDiv = document.createElement('div');
                                            const typeDiv = document.getElementById('add-type');
                                            const optionData = {{$types}};
                                            const firstOption = document.createElement('option');
                                            firstOption.innerText = 'Choose type';
                                            firstOption.setAttribute('selected', true);
                                            firstOption.setAttribute('disabled', true);
                                            select.appendChild(firstOption);
                                            optionData.forEach(element => {
                                                const option = document.createElement('option');
                                                option.innerText = element.name;
                                                option.setAttribute('value', element.id);
                                                select.appendChild(option);
                                            });
                                            select.setAttribute('class', 'form-control col-md-5');
                                            select.setAttribute('name', 'add_type[]');
                                            input.setAttribute('class', 'form-control col-md-7');
                                            input.setAttribute('name', 'add_values[]');
                                            inputDiv.setAttribute('class', 'row');
                                            inputDiv.insertBefore(input, inputDiv.firstChild);
                                            inputDiv.insertBefore(select, inputDiv.firstChild);
                                            typeDiv.insertBefore(inputDiv, typeDiv.firstChild);">{{ __('Add type') }}</a>
                                    <div id="add-type"></div>
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
@endsection
