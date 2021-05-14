<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>
                <div class="card-body">
                    @foreach($products as $product)
                        <div class="row" style="margin: 10px">
                            <div class="col-md-3" style="height: 100px;">
                                <img class="img-thumbnail" src="{{ $product['main_image'] ? $product['main_image']['url'] : '/image/No_Image_Available.jpg' }}" style="height: 100px; width: 100px">
                            </div>
                            <div class="col-md-9"><a href="/product/{{$product['id']}}">{{ $product['title'] }}</a> <br> {{$product['price']}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>