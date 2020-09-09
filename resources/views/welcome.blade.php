@extends('layouts')

@section('title', 'Welcome')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-2">
      <div class="row">
        <div class="col"><h2>Categories</h2></div>
      </div>
      <div class="row">
        <div class="col">
          <ul class="list-group">
            @foreach($categories as $category)
            <a href="{{route('woocommerce.categories.show', ['title' => $products->categories->name, 'id' => $prooducts->categories->id]}})" class="list-group-item">{{$category->categories->name}}</a>
            @endforeach
          </ul>
        </div>
      </div>

    </div>
      <div class="col">
        <div class="col">
          <h2 class="display-2">Products</h2>
        </div>
      </div>
      <div class="row">
        @foreach($products as product)
          <div class="col-4">
            <a href="{{route('woocommerce.products.show', ['title' => $product->name, 'id' => $prooduct->id]}})">
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
