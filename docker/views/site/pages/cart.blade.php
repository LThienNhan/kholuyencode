@extends('site.app')
@section('title', 'Shopping Cart')
@section('content')
<section class="section-pagetop bg-dark">
<div class="container clearfix">
<h2 class="title-page">Cart</h2>
</div>
</section>
<section class="section-content bg padding-y border-top">
<div class="container">
<div class="row">
<div class="col-sm-12">
@if (Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
</div>
</div>
<div class="row">
<main class="col-sm-9">
    <!-- điều kiện khi khách hàng chưa đăng nhập hoặc đăng nhập rồi nhưng sử dụng session -->
@if($Count > 0)
<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
    <th scope="col">Product</th>
    <th scope="col" width="120">Quantity</th>
    <th scope="col" width="120">Price</th>
    <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>
@foreach(\Cart::getContent() as $item)
    <tr>
        <td>
            <figure class="media">
                <figcaption class="media-body">
                    <h6 class="title text-truncate">{{ Str::words($item->name,20) }}</h6>
                    @foreach($item->attributes as $key  => $value)
                        <dl class="dlist-inline small">
                            <dt>{{ ucwords($key) }}: </dt>
                            <dd>{{ ucwords($value) }}</dd>
                        </dl>
                    @endforeach
                </figcaption>
            </figure>
        </td>
        <form action="{{ route('checkout.cart.update', $item->id) }}" method="POST" role="form" id="update">
        {{ csrf_field() }}
        <td>
            <input name="qty" type="number" value="{{ $item->quantity }}" class="form-control quantity" />
        </td>
    
        <td>
            <div class="price-wrap">
                <var class="price">{{ config('settings.currency_symbol'). number_format($item->price) }}</var>
                <small class="text-muted">each</small>
            </div>
        </td>
        <td class="text-right">
            <a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
            <button type="submit" class="btn btn-outline-danger">Update</button>
        </td>
        </form>
    </tr>
        
@endforeach
</tbody>
</table>
</div>

 <!-- điều kiện khi khách hàng  đăng nhập và sử dụng kho lưu trữ database  số lượng trong kho database 
 phải lớn hơn 0-->
@elseif(Auth::check() && Auth::user()->archives == 'database' && $cartCountDB > 0)
<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
    <th scope="col">Product</th>
    <th scope="col" width="120">Quantity</th>
    <th scope="col" width="120">Price</th>
    <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>
@foreach($Carts as $item)
    <tr>
        <td>
            <figure class="media">
                <figcaption class="media-body">
                    <h6 class="title text-truncate">{{ Str::words($item->name,20) }}</h6>
                </figcaption>
            </figure>
        </td>
        <form action="{{ route('checkout.cart.updateDB', $item->id) }}" method="POST" role="form" id="updateDB">
        {{ csrf_field() }}
        <td>
            <input name="qty" type="number" value="{{ $item->quantity }}" class="form-control quantity" />
        </td>
    
        <td>
            <div class="price-wrap">
                <var class="price">{{ config('settings.currency_symbol') }}{{number_format($item->price) }}</var>
                <small class="text-muted">each</small>
            </div>
        </td>
        <td class="text-right">
            <a href="{{ route('checkout.cart.removeDB', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
            <button type="submit" class="btn btn-outline-danger">Update</button>
        </td>
        </form>
    </tr>
        
@endforeach
</tbody>
</table>
</div>
@else
<p class="alert alert-warning">Your shopping cart is empty.</p>
@endif
</main>
 <!-- điều kiện khi khách hàng chưa đăng nhập tài khoản chỉ sử dụng session -->
@if($Count > 0)
<aside class="col-sm-3">
<a href="{{ route('checkout.cart.clear') }}" class="btn btn-danger btn-block mb-4">Clear Cart</a>
<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
<dl class="dlist-align h4">
<dt>Total:</dt>
<dd class="text-right">
<strong>{{ config('settings.currency_symbol') }}{{ number_format(\Cart::getSubTotal()) }}</strong>
 <!-- điều kiện khi khách hàng  đăng nhập và sử dụng kho lưu trữ database, số lượng trong kho database 
 phải lớn hơn 0 -->
@elseif(Auth::check() && Auth::user()->archives == 'database' && $cartCountDB > 0)
@php 
$total = 0;
foreach($Carts as $item)
{
$total += $item->grand_total;
}
@endphp
<aside class="col-sm-3">
<a href="{{ route('checkout.cart.clearDB') }}" class="btn btn-danger btn-block mb-4">Clear Cart</a>
<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
<dl class="dlist-align h4">
<dt>Total:</dt>
<dd class="text-right">
<strong>{{ config('settings.currency_symbol') }}{{ number_format($total) }}</strong>
@else
<aside class="col-sm-3">
<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
<dl class="dlist-align h4">
<dt>Total:</dt>
<dd class="text-right">
<strong>{{ config('settings.currency_symbol') }}0</strong>
@endif
</dd>
</dl>
<hr>
<figure class="itemside mb-3">
<aside class="aside"><img src="{{ asset('frontend/images/icons/pay-visa.png') }}"></aside>
<div class="text-wrap small text-muted">
Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards.
</div>
</figure>
<figure class="itemside mb-3">
<aside class="aside"> <img src="{{ asset('frontend/images/icons/pay-mastercard.png') }}"> </aside>
<div class="text-wrap small text-muted">
Pay by MasterCard and Save 40%.
<br> Lorem ipsum dolor
</div>
</figure>
 <!-- điều kiện khi khách hàng chưa đăng nhập tài khoản chỉ sử dụng session -->
@if($Count > 0)
<a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg btn-block">Proceed To Checkout</a>
 <!-- điều kiện khi khách hàng  đăng nhập và sử dụng kho lưu trữ database số lượng trong kho database 
 phải lớn hơn 0-->
@elseif(Auth::check() && Auth::user()->archives == 'database' && $cartCountDB > 0)
<a href="{{ route('checkout.index.db', Auth::user()->id ) }}" class="btn btn-success btn-lg btn-block">Proceed To Checkout</a>
@endif
</aside>
</div>
</div>
</section>
@stop
