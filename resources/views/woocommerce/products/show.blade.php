@extends('layouts')

@section('title', 'Product View')

@section('content')
<div class="container">
  <div class="row">
      <div class="col">
        <div class="col">
          <h2 class="display-2">Products</h2>
        </div>
      </div>
    </div>

      <div class="row">
        <div class="col-4">
              <div class="card">
                <img src="{{products->images->src}}" class="card-image-top" />
                <div class="card-body">
                  <h5 class="card-title">{{products->name}}</h5>
                  <p class="card-text">{{products->short_description}}</p>
                </div>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col">
            <div class="col">
              <a href="#" class="btn btn-success btn-lg">Add To Cart</a>
            </div>
          </div>
        </div>
</div>
@endsection
