@extends('layouts.master')

@section('title', 'Admin - Create product')

@section('style-libraries')
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{mix('css/product/detail.css')}}" />
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
                        <a href="{{ route('cart') }}" class="btn btn-outline-success my-2 my-sm-0" type="submit">Go to
                            cart</a>
                    </form>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6">
                                <div class="row justify-content-center">
                                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($product->images as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img class="d-block img-big"
                                                         src="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$image->path }}"
                                                         alt="{{ $image->name }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselIndicators" role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselIndicators" role="button"
                                           data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                                <div class="row">
                                    <ol class="carousel-indicators carousel-img-small">
                                        @foreach($product->images as $key => $image)
                                            <li data-target="#carouselIndicators" data-slide-to="{{ $key }}"
                                                class="active carousel-img-small-item">
                                                <img class="d-block w-10 img-small"
                                                     src="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$image->path }}">
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6">
                                <h3 class="card-title">{{ $product->name }}</h3>
                                <h5 class="box-title">Brand:
                                    <small class="text-success">{{ $product->brand->name }}</small>
                                </h5>
                                <p class="card-subtitle">{{ $product->description }}</p>

                                <h3 class="mt-5">
                                    ${{ $product->price }}
                                </h3>
                                <div class="d-flex align-items-center mb-3 pt-3">
                                    <h6 class="mr-3 mt-1">Quantity:</h6>
                                    <div class="center">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus"
                                                        data-field="quant[2]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[2]" id="quant" class="input-number quantity ml-1 mr-1" value="1" min="1" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-dark btn-rounded mr-1 add-product-to-cart"
                                        data-toggle="tooltip"
                                        data-id="{{ $product->id }}"
                                        data-price="{{ $product->price }}"
                                        data-name="{{ $product->name }}"
                                        data-brand="{{ $product->brand_id }}"
                                        data-image="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$product->images[0]->path }}"
                                        data-original-title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary btn-rounded btn-buy-now"
                                        data-id="{{ $product->id }}"
                                        data-price="{{ $product->price }}"
                                        data-name="{{ $product->name }}"
                                        data-brand="{{ $product->brand_id }}"
                                        data-image="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$product->images[0]->path }}"
                                >
                                    Buy Now
                                </button>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="warranty-information-tab" data-toggle="tab" href="#warranty-information" role="tab" aria-controls="warranty-information" aria-selected="false">Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery" aria-selected="false">Warranty information</a>
                        </li>
                    </ul>
                    <div class="tab-content p-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">{{ $product->description }}</div>
                        <div class="tab-pane fade" id="warranty-information" role="tabpanel" aria-labelledby="warranty-information-tab">{{ $product->warranty_information }}</div>
                        <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">{{ $product->delivery }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('js/home/detail.js')}}"></script>
    <script>
      //plugin bootstrap minus and plus
      //http://jsfiddle.net/laelitenetwork/puJ6G/
      $('.btn-number').click(function (e) {
        e.preventDefault()

        fieldName      = $(this).attr('data-field')
        type           = $(this).attr('data-type')
        var input      = $("input[name='" + fieldName + "']")
        var currentVal = parseInt(input.val())
        if (!isNaN(currentVal)) {
          if (type === 'minus') {
            if (currentVal > input.attr('min')) {
              input.val(currentVal - 1).change()
            }
            if (parseInt(input.val()) === input.attr('min')) {
              $(this).attr('disabled', true)
            }
          } else if (type === 'plus') {
            if (currentVal < input.attr('max')) {
              input.val(currentVal + 1).change()
            }
            if (parseInt(input.val()) === input.attr('max')) {
              $(this).attr('disabled', true)
            }
          }
        } else {
          input.val(0)
        }
      })

      $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val())
      })

      $('.input-number').change(function () {
        minValue     = parseInt($(this).attr('min'))
        maxValue     = parseInt($(this).attr('max'))
        valueCurrent = parseInt($(this).val())

        name = $(this).attr('name')
        if (valueCurrent >= minValue) {
          $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
          alert('Sorry, the minimum value was reached')
          $(this).val($(this).data('oldValue'))
        }
        if (valueCurrent <= maxValue) {
          $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
          alert('Sorry, the maximum value was reached')
          $(this).val($(this).data('oldValue'))
        }


      })
      $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
          // Allow: Ctrl+A
          (e.keyCode === 65 && e.ctrlKey === true) ||
          // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
          // let it happen, don't do anything
          return
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault()
        }
      })
    </script>
@stop