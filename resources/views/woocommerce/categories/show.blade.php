@extends('layouts')

@section('title', 'Category Products')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col">
        <div class="col">
          <h2 class="display-2">Products</h2>
        </div>
      </div>
      <div class="row">
        @foreach($products as product)
          <div class="col-4">
            <a href="{{route('woocommerce.show', ['title' => $product->name, 'id' => $prooduct->id]}})">
              <div class="card">
                <img src="{{products->images->src}}" class="card-image-top" />
                <div class="card-body">
                  <h5 class="card-title">{{products->name}}</h5>
                  <p class="card-text">{{products->short_description}}</p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
</div>
@endsection
