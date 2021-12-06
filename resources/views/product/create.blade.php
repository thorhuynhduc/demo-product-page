@extends('layouts.master')

@section('title', 'Admin - Create product')

@section('style-libraries')
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{mix('css/product/create.css')}}" />
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
                <nav class="navbar navbar-light bg-light justify-content-end">
                    <form class="form-inline">
                        <a class="nav-link active" href="{{ route('product-list') }}">Product List</a>
                    </form>
                </nav>
            </div>
        </div>
        <div class="row bg-light pb-5">
            <div class="col-12">
                <form action="{!! route('product-store') !!}" method="POST" id="createProduct" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="brand_id">Brand: </label>
                            <select class="form-control" id="brand_id" name="brand_id">
                                <option value="">Choose brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="" placeholder="Enter price">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="delivery">Delivery</label>
                            <textarea class="form-control" id="delivery" name="delivery" rows="3" placeholder="Enter delivery"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="warranty_information">Warranty information</label>
                            <textarea class="form-control" id="warranty_information" name="warranty_information" rows="3" placeholder="Enter warranty information"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="field" align="left">
                            <h6>Upload product images</h6>
                            <div class="col-md-6">
                                <div data-role="dynamic-fields" style="width: 400px;">
                                    <div class="form-inline form-row form-upload-image-product">
                                        <!-- file upload start-->
                                        <div class="mb-2 mr-sm-2 col-sm-5 wrap-input-container">
                                            <label class="custom-file-upload form-control">
                                                <i class="fa fa-cloud-upload"></i> Upload image
                                            </label>
                                            <input class="file-upload" name="images[]" type="file">
                                        </div>
                                        <!-- file upload ends-->

                                        <button class="btn btn-sm btn-danger  mb-2" data-role="remove">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary ml-1 mb-2" data-role="add">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <img class="img-preview" src="{{ asset('images/default.jpg') }}">
                                    </div>
                                </div>  <!-- /div[data-role="dynamic-fields"] -->
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit Create Product</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('js/product/create.js')}}" ></script>
@stop