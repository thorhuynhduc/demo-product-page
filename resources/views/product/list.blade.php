@extends('layouts.master')

@section('title', 'Admin - Create product')

@section('style-libraries')
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{mix('css/product/list.css')}}" />
@stop

@section('content')
    <div class="container">
        <div class="row bg-light">
            <div class="col-12">
                <!-- Image and text -->
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('product-list') }}">
                        <img src="{{ asset('images/thor_dev.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                        {{ $currentUser->name }}
                    </a>
                    <form class="form-inline">
                        <a href="{{ route('logout') }}" class="btn btn-outline-success my-2 my-sm-0">Logout</a>
                    </form>
                </nav>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 bg-light">
                <a href="{{ route('product-list') }}" class="navbar-brand">Product list</a>
                <nav class="navbar navbar-light bg-light justify-content-end">
                    <a href="{{ route('product-create') }}" class="btn btn-success my-2 my-sm-0" type="submit">Add new product</a>
                </nav>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-12 bg-light">
                <nav class="navbar navbar-light bg-light justify-content-between">
                    <form id="search-product-form">
                        <div class="row">
                            <div class="col-3">
                                <label for="brand_id">Brand:</label>
                                <select id="brand_id" name="brand_id" class="form-control">
                                    <option value="">Choose...</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ isset($param['brand_id']) && $param['brand_id'] == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="price_from">Price from:</label>
                                <input type="number" class="form-control" name="price_from" id="price_from" value="{{ isset($param['price_from']) ? $param['price_from'] : '' }}" placeholder="From">
                            </div>
                            <div class="col-2">
                                <label for="price_to">Price to:</label>
                                <input type="number" class="form-control" name="price_to" id="price_to" value="{{ isset($param['price_to']) ? $param['price_to'] : '' }}" placeholder="To">
                            </div>
                            <div class="col-4">
                                <label for="keyword">Name or Description:</label>
                                <input class="form-control mr-sm-2" type="text" name="keyword" value="{{ isset($param['keyword']) ? $param['keyword'] : '' }}" placeholder="Search" aria-label="Search">
                            </div>
                            <div class="col-1" style="margin-top: 31px;">
                                <button class="btn btn-outline-success my-2 my-sm-0 btn-search-product" type="button">Search product</button>
                            </div>
                        </div>
                    </form>
                </nav>
            </div>
        </div>
        <div class="row bg-light pt-3 pb-3">
            <div class="col-12 bg-light">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody id="product-list">
                        @foreach($products as $product)
                            <tr class="product-item-{{ $product->id }}">
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td class="abc">{{ $product->description }}</td>
                                <td>${{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('product-edit', ['productId' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a type="button" class="btn btn-danger btn-sm delete-product" data-id="{{ $product->id }}" style="color: white">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('js/product/index.js')}}" ></script>
@stop