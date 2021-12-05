<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        .quantity {
            width: 50px;
        }

        body{
            background-color: #edf1f5;
            margin-top:20px;
        }
        .card {
            margin-bottom: 30px;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 0;
        }
        .card .card-subtitle {
            font-weight: 300;
            margin-bottom: 10px;
            color: #8898aa;
        }
        .table-product.table-striped tbody tr:nth-of-type(odd) {
            background-color: #f3f8fa!important
        }
        .table-product td{
            border-top: 0px solid #dee2e6 !important;
            color: #728299!important;
        }
        .img-big {
            height: 400px;width: 425px;
        }
        .carousel-img-small {
            width: 100% !important;margin-left: 0 !important;
        }
        .carousel-img-small-item {
            width: 25% !important; margin-left: 0 !important;
        }
        .img-small {
            width: 100% !important;height: 90px !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="white-box justify-content-center">--}}
{{--                            <img style="height: 400px;max-width: 425px;" src="https://via.placeholder.com/430x600/00CED1/000000" class="img-responsive">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row justify-content-center">
                        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($product->images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="d-block img-big" src="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$image->path }}" alt="{{ $image->name }}">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                    <div class="row">
                        <ol class="carousel-indicators carousel-img-small">
                            @foreach($product->images as $key => $image)
                                <li data-target="#carouselIndicators" data-slide-to="{{ $key }}" class="active carousel-img-small-item">
                                    <img class="d-block w-10 img-small" src="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$image->path }}">
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <h2>
                        ${{ $product->price }}
                    </h2>

                    <p class="card-subtitle mt-3">{{ $product->description }}</p>

                    <h3 class="box-title mt-5">Brand: <small class="text-success">Nike</small></h3>


                    <div class="d-flex align-items-center mb-5 pt-3">
                        <h5 class="mr-4">Quantity:</h5>
                        <div class="center">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                  </span>
                                <input type="text" name="quant[2]" class="input-number quantity ml-1 mr-1" value="10" min="1" max="100">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <button class="btn btn-primary btn-rounded">Buy Now</button>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  //plugin bootstrap minus and plus
  //http://jsfiddle.net/laelitenetwork/puJ6G/
  $('.btn-number').click(function(e){
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
      if(type == 'minus') {

        if(currentVal > input.attr('min')) {
          input.val(currentVal - 1).change();
        }
        if(parseInt(input.val()) == input.attr('min')) {
          $(this).attr('disabled', true);
        }

      } else if(type == 'plus') {

        if(currentVal < input.attr('max')) {
          input.val(currentVal + 1).change();
        }
        if(parseInt(input.val()) == input.attr('max')) {
          $(this).attr('disabled', true);
        }

      }
    } else {
      input.val(0);
    }
  });
  $('.input-number').focusin(function(){
    $(this).data('oldValue', $(this).val());
  });
  $('.input-number').change(function() {

    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
      $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
      alert('Sorry, the minimum value was reached');
      $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
      alert('Sorry, the maximum value was reached');
      $(this).val($(this).data('oldValue'));
    }


  });
  $(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });
</script>
</html>
