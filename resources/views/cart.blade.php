@extends('layouts.master')

@section('title', 'App - Top Page')

@section('style-libraries')
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{mix('css/home/cart.css')}}" />
@stop

@section('content')
    <div class="container pb-5 mt-n2 mt-md-n3">
        <div class="row">
            <div class="col-12">
                <!-- Image and text -->
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/thor_dev.png') }}" width="40" height="40" class="d-inline-block align-top" alt="">
                        Thor shop
                    </a>
                    <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary">
                        <a class="font-size-sm" href="{{ route('home') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-left"
                                 style="width: 1rem; height: 1rem;">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                            Continue shopping</a></h2>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-9 col-md-8">
                <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary">
                    <span>Carts</span>
                </h2>
                <!-- Item-->
                @if(!empty($cart))
                    @foreach($cart as $key => $cartItem)
                        <div class="d-sm-flex justify-content-between my-4" id="cart-item-{{ $key }}">
                            <div class="media d-block d-sm-flex text-center text-sm-left">
                                <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="{{ $cartItem['image'] }}" alt="Product"></a>
                                <div class="media-body pt-3">
                                    <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">{{ $cartItem['name'] }}</a></h3>
                                    <div class="font-size-sm"><span class="text-muted mr-2">Brand:</span>Pink / Dark green</div>
                                    <div class="font-size-lg text-primary pt-2">${{ $cartItem['price'] }}</div>
                                </div>
                            </div>
                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                                <div class="form-group mb-2">
                                    <label for="quantity4">Quantity</label>
                                    <input class="form-control form-control-sm" type="number" id="quantity4" value="{{ $cartItem['quantity'] }}">
                                </div>
                                <button class="btn btn-outline-danger btn-sm btn-block mb-2 btn-remove-cart"
                                        data-product-id="{{ $cartItem['product_id'] }}"
                                        data-key="{{ $key }}"
                                        type="button"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>Remove</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Sidebar-->
            <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
                <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
                <div class="h3 font-weight-semibold text-center py-3" id="sum-price">${{ $sum }}</div>
                <hr>
                <a class="btn btn-primary btn-block" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>Proceed to Checkout</a>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('js/cart/index.js')}}" ></script>
@stop