<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@extends('site.app')
@section('title', 'Checkout')
@section('content')
<section class="section-pagetop bg-dark">
<div class="container clearfix">
<h2 class="title-page">Checkout</h2>
</div>
</section>
<section class="section-content bg padding-y">
<div class="container">
<div class="row">
<div class="col-sm-12">
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
</div>
</div>
<form action="{{ route('checkout.place.order') }}" method="POST" role="form">
@csrf
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <header class="card-header">
                <h4 class="card-title mt-2">Billing Details</h4>
            </header>
            <article class="card-body">
                <div class="form-row">
                    <div class="col form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" name="first_name" required >
                    </div>
                    <div class="col form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="last_name" required >
                    </div>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" required >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" required >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Country</label>
                        <input type="text" class="form-control" name="country" required >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-6">
                        <label>Post Code</label>
                        <input type="text" class="form-control" name="post_code" required >
                    </div>
                    <div class="form-group  col-md-6">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" required >
                    </div>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" required  name="email" value="{{ auth()->user()->email }}" disabled>
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Order Notes</label>
                    <textarea class="form-control" name="notes" rows="6" required></textarea>
                </div>
            </article>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Your Order</h4>
                    </header>
                    <article class="card-body">
                        <dl class="dlist-align">
                            <dt>Total cost: </dt>
                @if(Auth::user()->archives == 'database' && isset($total) && isset($quantity))
                <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ number_format($total) }} </dd>
                <input type="hidden" name="total" value="{{$total}}">
                <input type="hidden" name="quantity" value="{{$quantity}}">
                @else
                <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ number_format(\Cart::getSubTotal()) }} </dd>
                @endif
                </dl>
                <dl>
                <dt style="font-size:20px">Payment Method</dt>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Cash On Delivery</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pay By Bank Card</button>
                        </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <input type='checkbox' value="Cash On Delivery" name="payment_method_cod" class=" @error('payment_method_cod') is-invalid @enderror">
                            Cash On Delivery<br>
                            <label style="color:red">@error('payment_method_cod') {{ $message }} @enderror</label>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <select class="form-select form-select-lg mb-3  @error('payment_method_bank') is-invalid @enderror" aria-label=".form-select-md example" name="payment_method_bank" style="font-size:15px">
                                <option value=null selected>Choose payment bank</option>
                                <option value="Bank VietcomBank">VietcomBank</option>
                                <option value="Bank ACB">ACB</option>
                                <option value="Bank VietinBank">VietinBank</option>
                            </select>
                            <label style="color:red"> @error('payment_method_bank') {{ $message }} @enderror </label>
                            <h5>Bank Card Number</h5>
                            <input type="number" placeholder="Please enter your account number" class="form-control  @error('card_number') is-invalid @enderror" name="card_number">
                            <label style="color:red">@error('card_number') {{ $message }} @enderror</label>
                        </div>
                    </dl>
                        
                            </article>
                        </div>
                    </div>

            <div class="col-md-12 mt-4">
                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
            </div>
        </div>
    </div>
</div>
</form>
</div>
</section>
@stop

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
