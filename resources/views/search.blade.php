@extends('layouts.app')

@section('title', 'Search')
@section('content')
<div class="container">

    <header class="border-bottom my-3 pb-3">
        <div class="form-inline">
            <span class="mr-md-auto">{{$products->count()}} Items found </span>
            <select class="mr-2 form-control">
                <option>Latest items</option>
                <option>Trending</option>
                <option>Most Popular</option>
                <option>Cheapest</option>
            </select>
        </div>
    </header><!-- sect-heading -->
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3">
            <div href="#" class="card card-product-grid">
                <a href="{{route('product.show', $product->slug)}}" class="img-wrap"> <img
                        src="{{ $product?->getFirstImage()?->image_full_path }}"> </a>
                <figcaption class="info-wrap">
                    <a href="{{route('product.show', $product->slug)}}" class="title">{{$product->name}}</a>
                    <div class="price">{{shopper_money_format($product->price_amount)}}</div> <!-- price-wrap.// -->
                    <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">

                        <input type="hidden" value="{{ $product->id }}" name="id" class="d-none">
                        <button type="submit" class="btn btn-primary btn-sm btn-block"> Add to cart </button>
                    </form>
                </figcaption>
            </div>
        </div>
        @endforeach
    </div> <!-- row.// -->


    {{--
<nav class="mt-4" aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> --}}
</div>
@stop
