@extends('layouts.app')

@section('title', 'Product details')
@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-md-11">
            <div class="card">
                <div class="row no-gutters">
                    <aside class="col-sm-6 border-right">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <a href="#"><img src="{{ $product?->getFirstImage()?->image_full_path }}"></a>
                            </div> <!-- img-big-wrap.// -->
                            {{-- <div class="thumbs-wrap">
                                <a href="#" class="item-thumb"> <img
                                        src="https://www.buyrealfakepassport.cc/image/cache/catalog/Passports/British%20passport%20cover-270x270.JPG"></a>
                                <a href="#" class="item-thumb"> <img
                                        src="https://www.buyrealfakepassport.cc/image/cache/catalog/Passports/British%20passport%20cover-270x270.JPG"></a>
                                <a href="#" class="item-thumb"> <img
                                        src="https://www.buyrealfakepassport.cc/image/cache/catalog/Passports/British%20passport%20cover-270x270.JPG"></a>
                                <a href="#" class="item-thumb"> <img
                                        src="https://www.buyrealfakepassport.cc/image/cache/catalog/Passports/British%20passport%20cover-270x270.JPG"></a>
                            </div> --}}
                            <!-- thumbs-wrap.// -->
                        </article> <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-sm-6">
                        @php
                        $attributes = Shopper\Framework\Models\Shop\Product\ProductAttribute::query()
                        ->with('values')
                        ->where('product_id', $product->id)
                        ->get()
                        ->map(function ($pa) {
                        $pa['type'] = $pa->attribute->type;

                        return $pa;
                        });

                        //dd($attributes)
                        @endphp
                        <article class="content-body">
                            <h2 class="title">{{$product->name}}</h2>

                            {!!$product->description !!}
                            <ul class="list-normal cols-two">
                                @foreach ($attributes as $attribute)

                                <li>{{$attribute->attribute?->name}}: {{$attribute->values[0]?->product_custom_value}}
                                </li>
                                @endforeach
                            </ul>

                            <div class="h3 my-4">
                                <var class="price h4">{{ shopper_money_format($product->price_amount)}}</var>
                            </div> <!-- price-wrap.// -->

                            <form class="form-row" action="{{ route('cart.add') }}" method="POST"
                                enctype="multipart/form-data">

                                <div class="col-2">

                                    <input type="number" value="1" name="quantity"
                                        class="form-control @error('quantity') is-invalid @enderror">

                                    <input type="hidden" value="{{ $product->id }}" name="id" class="d-none">
                                </div> <!-- col.// -->
                                <div class="col">
                                    <button type="submit" class="btn  btn-primary w-100"> Add to cart <i
                                            class="fas fa-shopping-cart"></i> </button>

                                </div> <!-- col.// -->
                                <div class="col" style="visibility: hidden">
                                    {{-- <a href="#" class="btn  btn-light"> <i class="fas fa-heart"></i> </a> --}}
                                </div> <!-- col.// -->
                            </form> <!-- row.// -->

                        </article> <!-- product-info-aside .// -->
                    </main> <!-- col.// -->
                </div> <!-- row.// -->
            </div>
        </div>
    </div>
</div>
@stop
