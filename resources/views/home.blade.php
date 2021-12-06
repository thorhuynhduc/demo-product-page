@extends('layouts.master')

@section('title', 'App - Top Page')

@section('style-libraries')
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{mix('css/home/index.css')}}" />
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Image and text -->
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/thor_dev.png') }}" width="40" height="40" class="d-inline-block align-top" alt="">
                        Thor shop
                    </a>
                    <form class="form-inline">
                        <a href="{{ route('cart') }}" class="btn btn-outline-success my-2 my-sm-0" type="submit">Go to cart</a>
                    </form>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-4 col-md-3">
                <form>
                    <div class="well">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search products..." aria-label="Search products..." aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary search-product" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Filter -->
                <form class="shop__filter">
                    <!-- Price -->
                    <h3 class="headline">
                        <span>Price</span>
                    </h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="price_form_to" value="">
                        <label class="form-check-label">
                            All
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="price_form_to" value="0_25">
                        <label class="form-check-label">
                            Under $25
                        </label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="price_form_to" value="25_50">
                        <label class="form-check-label">
                            $25 to $50
                        </label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="price_form_to" value="50_100">
                        <label class="form-check-label">
                            $50 to $100
                        </label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="price_form_to" value="100_300">
                        <label class="form-check-label">
                            $100 to $300
                        </label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="price_form_to" value="300_1000">
                        <label class="form-check-label">
                            $300 to $1000
                        </label>
                    </div>

                    <!-- Checkboxes -->
                    <h3 class="headline mt-2">
                        <span>Brand</span>
                    </h3>
                    @foreach($brands as $brand)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $brand->id }}" name="brand_id">
                            <label class="form-check-label">
                                {{ $brand->name }}
                            </label>
                        </div>
                    @endforeach
                </form>
            </div>

            <div class="col-sm-8 col-md-9">
                <!-- Filters -->
                <ul class="shop__sorting">
                    <li class="sorting-product active" data-sort-by="created_at" data-sort-type="desc"><a href="">Newest</a></li>
                    <li class="sorting-product" data-sort-by="price" data-sort-type="asc"><a href="">Price (low)</a></li>
                    <li class="sorting-product" data-sort-by="price" data-sort-type="desc"><a href="">Price (high)</a></li>
                </ul>

                <div class="row" id="product-list">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4">
                            <div class="shop__thumb">
                                <a href="{{ route('product-detail', ['productId' => $product->id]) }}">
                                    <div class="shop-thumb__img">
                                        <img style="height: 220px;" src="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$product->images[0]->path }}" class="img-responsive" alt="...">
                                    </div>
                                    <h5 class="shop-thumb__title">
                                        {{ $product->name }}
                                    </h5>
                                    <div class="shop-thumb__price">
                                        <span class="shop-thumb-price_new">${{ $product->price }}</span>
                                    </div>
                                </a>

                                <button class="btn btn-dark btn-rounded mr-1 add-product-to-cart mt-3"
                                        data-toggle="tooltip"
                                        data-id="{{ $product->id }}"
                                        data-price="{{ $product->price }}"
                                        data-name="{{ $product->name }}"
                                        data-brand="{{ $product->brand_id }}"
                                        data-image="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$product->images[0]->path }}"
                                        data-original-title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary btn-rounded btn-buy-now mt-3"
                                        data-id="{{ $product->id }}"
                                        data-price="{{ $product->price }}"
                                        data-name="{{ $product->name }}"
                                        data-brand="{{ $product->brand_id }}"
                                        data-image="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$product->images[0]->path }}"
                                >Buy Now</button>
                            </div>
                        </div>
                    @endforeach
                </div> <!-- / .row -->
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div> <!-- / .col-sm-8 -->
        </div> <!-- / .row -->
    </div>
@stop

@section('scripts')
    <script src="{{asset('js/home/index.js')}}" ></script>
    <script src="{{asset('js/home/detail.js')}}" ></script>
@stop