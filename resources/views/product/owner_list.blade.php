@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <table class="table">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['category']['title'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>
                  <a href="{{ route('productUpdate', ['id' => $product['id']]) }}" class="btn btn-warning">
                    {{ __('Edit') }}</a>
                  <a href="{{ route('productDelete', ['id' => $product['id']]) }}" class="btn btn-danger">
                    {{ __('Delete') }}</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
