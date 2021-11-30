<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
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
                                <div class="carousel-item active">
                                    <img class="d-block img-big" src="https://5ef74c8f1131783d15bb0867--bigbag-html.netlify.app/assets/img/products/signle-product/product-slide-big-02.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-big" src="https://5ef74c8f1131783d15bb0867--bigbag-html.netlify.app/assets/img/products/signle-product/product-slide-big-03.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item img-big">
                                    <img class="d-block" src="https://5ef74c8f1131783d15bb0867--bigbag-html.netlify.app/assets/img/products/signle-product/product-slide-big-01.jpg" alt="Third slide">
                                </div>
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
                            <li data-target="#carouselIndicators" data-slide-to="0" class="active carousel-img-small-item">
                                <img class="d-block w-10 img-small" src="https://5ef74c8f1131783d15bb0867--bigbag-html.netlify.app/assets/img/products/signle-product/product-slide-big-02.jpg">
                            </li>
                            <li data-target="#carouselIndicators" data-slide-to="1" class="carousel-img-small-item">
                                <img class="d-block w-10 img-small" src="https://5ef74c8f1131783d15bb0867--bigbag-html.netlify.app/assets/img/products/signle-product/product-slide-small-03.jpg">
                            </li>
                            <li data-target="#carouselIndicators" data-slide-to="2" class="carousel-img-small-item">
                                <img class="d-block w-10 img-small" src="https://5ef74c8f1131783d15bb0867--bigbag-html.netlify.app/assets/img/products/signle-product/product-slide-small-01.jpg">
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h3 class="card-title">Rounded Chair</h3>
                    <h2>
                        $153
                        {{-- <small class="text-success">(36%off)</small>--}}
                    </h2>

                    <p class="card-subtitle mt-3">Lorem Ipsum available,but the majority have suffered alteration in some form,by injected humour,or randomised words which don't look even slightly believable.but the majority have suffered alteration in some form,by injected humour</p>

                    <h3 class="box-title mt-5">Brand: <small class="text-success">Nike</small></h3>


                    <div class="d-flex align-items-center mb-5 pt-3">
                        <h5 class="mr-4">Quantity:</h5>
                        <div class="SingleCartListInner cartListInner pl-1">
                            <form action="#">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr class="border-0">
                                            <td class="count-input border-0 p-0">
                                                <a class="incr-btn" data-action="decrease" href="#"><i class="fa fa-minus"></i></a>
                                                <input class="quantity" type="text" value="1" style="width: 30px;text-align: center;">
                                                <a class="incr-btn" data-action="increase" href="#"><i class="fa fa-plus"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>

                    <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <button class="btn btn-primary btn-rounded">Buy Now</button>

{{--                    <p class="mt-5">--}}
{{--                        <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>--}}
{{--                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>--}}
{{--                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>--}}
{{--                    </p>--}}
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
{{--                    <div class="row">--}}
{{--                        <div class="collapse multi-collapse" id="multiCollapseExample1">--}}
{{--                            <div class="card card-body">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="collapse multi-collapse" id="multiCollapseExample2">--}}
{{--                            <div class="card card-body">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
