@extends('site.app')
@section('title', $product->name)
@section('content')
<section class="section-pagetop bg-dark">
<div class="container clearfix">
<h2 class="title-page">{{ $product->name }}</h2>
</div>
</section>
<section class="section-content bg padding-y border-top" id="site">
<div class="container">
<div class="row">
<div class="col-sm-12">
@if (Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="row no-gutters">
<aside class="col-sm-5 border-right">
<article class="gallery-wrap">
    @if ($product->images->count() > 0)
        <div class="img-big-wrap">
            <div class="padding-y">
                <a href="{{  asset('images/'.$product->images->first()->full) }}" data-fancybox="">
                    <img style="width:100%;height:100%" src="{{  asset('images/'.$product->images->first()->full) }}" alt="">
                </a>
            </div>
        </div>
    @else
        <div class="img-big-wrap">
            <div>
                <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
            </div>
        </div>
    @endif
        @if ($product->images->count() > 0)
        <div class="img-small-wrap">
            @foreach($product->images as $image)
                <div class="item-gallery">
                    <img src="{{  asset('images/'.$product->images->first()->full) }}" alt="">
                </div>
            @endforeach
        </div>
    @endif
</article>
</aside>
<aside class="col-sm-7">
<article class="p-5">
    <h3 class="title mb-3">{{ $product->name }}</h3>
    <dl class="row">
        <dt class="col-sm-3">SKU</dt>
        <dd class="col-sm-9">{{ $product->sku }}</dd>
        <dt class="col-sm-3">Weight</dt>
        <dd class="col-sm-9">{{ $product->weight }} Kilogam</dd>
    </dl>
    <div class="mb-3">
        @if ($product->sale_price > 0)
            <var class="price h3 text-danger">
                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ number_format($product->sale_price) }}</span>
                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ number_format($product->price) }}</del>
            </var>
        @else
            <var class="price h3 text-success">
                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ number_format($product->price) }}</span>
            </var>
        @endif
    </div>
    <hr>
    <!-- điều kiện khi khách hàng đăng nhập tài khoản và có kho lưu trữ là database -->
    <!-- @if (Auth::check()&&Auth::user()->archives == 'database')
    <form action="{{route('product.add.cartDB')}}" method="POST" role="form" id="addToCart"> -->
         <!-- điều kiện khi khách hàng đăng nhập tài khoản và có kho lưu trữ là session -->
        <!-- @elseif (Auth::check()&&Auth::user()->archives == 'session')
    <form action="{{route('product.add.cart')}}" method="POST" role="form" id="addToCart">
        @else -->
    <!-- điều kiện khi khách hàng không đăng nhập -->
    <!-- <form action="{{route('product.add.cart')}}" method="POST" role="form" id="addToCart">
        @endif -->

        
    <form action="{{route('product.add.cart')}}" method="POST" role="form" id="addToCart">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <dl class="dlist-inline">
                    @foreach($attributes as $attribute)
                    
                            <dt>{{ $attribute->name }}: </dt>
                            <dd>
                                <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                    <option data-price="0" value="1"> Select a {{ $attribute->name }}</option>
                                    @foreach($product->attributes as $attributeValue)
                                        @if ($attributeValue->attribute_id == $attribute->id)
                                            <option
                                                data-price="{{ $attributeValue->price }}"
                                                value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </dd>
                   
                    @endforeach
                </dl>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <dl class="dlist-inline">
                    <dt>Quantity: </dt>
                    <dd>
                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                        <input type="hidden" name="name" value=" {{ $product->name }}">
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                    </dd>
                </dl>
            </div>
        </div>
        <hr>     
        <!-- khi sữ dụng lưu database -->
        <!-- @if (Auth::check() && Auth::user()->archives == 'database')
        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
        @else
        <a href="{{ route('login') }}" class="btn btn-danger">Login Now</a>
        @endif -->
         <!-- end -->
          <!-- khi sữ dụng lưu session -->
        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
    



        <!-- điều kiện khi khách hàng đăng nhập tài khoản và chưa có kho lưu trữ -->
     <!-- @if (Auth::check() && Auth::user()->archives == null)
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Choose repository
    </button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rules">
    Storage Rules
    </button> -->
        <!-- điều kiện khi khách hàng đăng nhập tài khoản và có kho lưu trữ rồi thì phần chọn và phần 
        quy định sẽ mất chỉ có thêm sản phẩm-->
        <!-- @elseif (Auth::check() && Auth::user()->archives != null)
    <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
        @else -->
            <!-- điều kiện khi khách hàng chưa đăng nhập sẽ không được đăng ký kho lưu trữ -->
    <!-- <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
        @endif -->
         
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Please select your cart archive</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<center> -->
<!-- điều kiện khi khách hàng đăng nhập tài khoản
@if ( Auth::check())
@php 
if (Auth::check()&&Auth::user()->id) {
    $id = Auth::user()->id;
}
@endphp
<a onclick="return confirm(`Are you sure you choose Session?`)" href="{{ route('cart.seesion',  $id)}}" style="font-size:20px;margin-right:20px" class="btn btn-danger">Session</a>
<a onclick="return confirm(`Are you sure you choose Database?`)" href="{{ route('cart.database',  $id)}}" style="font-size:20px" class="btn btn-primary">Database</a>
@endif -->
<!-- </center>
</div>
</div>
</div>
</div>
<div class="modal fade" id="rules" tabindex="-1" role="dialog" aria-labelledby="rulesLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title" id="rulesLabel">STORAGE RULES</h1>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" style="color:black">
<h3 style="color:green">Session</h3>
<label>When choosing the session cart archive, the user will add the product to the cart, the product 
    will only exist in the cart for a short time and not fixed for a long time.</label>
<h3  style="color:green">Database</h3>
<label>When choosing Database shopping cart storage, users will add products to the cart, products 
    will be stored in the database, products will remain in the cart even after logging out or for a 
    long time.</label>
<h3 style="color:orange">Advice</h3>
<label>The repository will not be re-selected without the support of the site manager, please 
consider before choosing.</label>

<h3 style="color:red">Warning</h3>
<label>when selecting the database repository the previous products in the cart you selected will be 
deleted to store the new products in the database repository</labael>
</div>
</div>
</div>
</div>
</form> -->

</article>
</aside>
</div>
</div>
</div>
<div class="col-md-12">
<article class="card mt-4">
<div class="card-body">
{!! $product->description !!}
</div>
</article>
</div>
</div>
</div>
</section>
@stop
@push('scripts')
<script>
$(document).ready(function () {
$('#addToCart').submit(function (e) {
if ($('.option').val() == 0) {
e.preventDefault();
alert('Please select an option');
}
});
$('.option').change(function () {
$('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
let extraPrice = $(this).find(':selected').data('price');
let price = parseFloat($('#productPrice').html());
let finalPrice = (Number(extraPrice) + price).toFixed(2);
$('#finalPrice').val(finalPrice);
$('#productPrice').html(finalPrice);
});
});
</>
@endpush
