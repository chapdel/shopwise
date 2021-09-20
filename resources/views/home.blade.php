@extends('layouts.app')

@section('content')

<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro">

    <div class="intro-banner-wrap">
        <img src="{{url('/Slider.jpg')}}" class="w-100 img-fluid"
            style="max-height: 300px !important; object-fit: cover">
    </div>

</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<section class="section-content">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">Popular products</h3>
        </header><!-- sect-heading -->


        <div class="row">
            @foreach ($popular as $product)
            <div class="col-md-3">
                <div class="card card-product-grid">
                    <a href="{{route('product.show', $product->slug)}}" class="img-wrap img-fluid"> <img
                            class="img-fluid m-1 rounded" src="{{ $product->getFirstImage()?->image_full_path }}">
                    </a>
                    <figcaption class="info-wrap">
                        <a href="{{route('product.show', $product->slug)}}" class="title">{{$product->name}}</a>
                        <div class="price">{{ shopper_money_format($product->price_amount)}}</div>
                        <!-- price-wrap.// -->
                        <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="{{ $product->id }}" name="id" class="d-none">
                            <button type="submit" class="btn btn-primary btn-sm btn-block"> Add to cart </button>
                        </form>
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            @endforeach
        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">New arrived</h3>
        </header><!-- sect-heading -->

        <div class="row">
            @foreach ($arrival as $product)
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="{{route('product.show', $product->slug)}}" class="img-wrap"> <img
                            class="img-fluid m-1 rounded" src="{{ $product->getFirstImage()?->image_full_path }}">
                    </a>
                    <figcaption class="info-wrap">
                        <a href="{{route('product.show', $product->slug)}}" class="title">{{$product->name}}</a>
                        <div class="price">{{ shopper_money_format($product->price_amount)}}</div>
                        <!-- price-wrap.// -->
                        <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">

                            <input type="hidden" value="{{ $product->id }}" name="id" class="d-none">
                            <button type="submit" class="btn btn-primary btn-sm btn-block"> Add to cart </button>
                        </form>
                    </figcaption>
                </div>
            </div>
            @endforeach
        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y-sm">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Our Categories</h3>
        </header><!-- sect-heading -->

        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-2 col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="{{$category->getFirstImage()?->image_full_path}}"
                            class="img-fluid m-1 rounded"></a>
                    <figcaption class="border-top pt-2">{{$category->name}}</figcaption>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            @endforeach
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->

@endsection
