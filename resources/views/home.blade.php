<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body{margin-top:20px;}


        .shop-index-features__heading + p {
            color: #777777;
        }
        /* Blog post */
        .shop-index-blog__posts > [class*="col-"] {
            padding-top: 20px;
            padding-bottom: 20px;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }
        .shop-index-blog__posts > [class*="col-"]:last-child {
            border-right: 0;
        }

        .shop-index-blog__img > img {
            height: 100%;
            width: auto;
        }

        @media (max-width: 991px) {
        }
        @media (max-width: 767px) {
            .shop-index-blog__posts > [class*="col-"] {
                padding-top: 0;
                padding-bottom: 60px;
                border-right: 0;
            }
            .shop-index-blog__posts > [class*="col-"]:last-child {
                padding-bottom: 0;
            }
        }

        .shop-index__newsletter input[type="email"] {
            height: 42px;
            padding: 11px 12px;
        }
        .shop-index__newsletter button[type="submit"] {
            padding: 11px 30px;
            width: 100%;
        }
        @media (min-width: 768px) {
            .shop-index__newsletter input[type="email"] {
                border-radius: 21px 0 0 21px;
            }
            .shop-index__newsletter button[type="submit"] {
                margin-left: -3px;
                border-radius: 0 21px 21px 0;
                width: auto;
            }
        }
        /** Shop: Thumbnails **/
        .shop__thumb {
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            background-color: white;
            text-align: center;
            -webkit-transition: border-color 0.1s, -webkit-box-shadow 0.1s;
            -o-transition: border-color 0.1s, box-shadow 0.1s;
            transition: border-color 0.1s, box-shadow 0.1s;
        }
        .shop__thumb:hover {
            border-color: rgba(0, 0, 0, 0.07);
            -webkit-box-shadow: 0 5px 30px rgba(0, 0, 0, 0.07);
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.07);
        }
        .shop__thumb > a {
            color: #333333;
        }
        .shop__thumb > a:hover {
            text-decoration: none;
        }
        .shop-thumb__img {
            position: relative;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .shop-thumb__title {
            font-weight: 600;
        }
        .shop-thumb__price {
            color: #777777;
        }
        .shop-thumb-price_old {
            text-decoration: line-through;
        }
        .shop-thumb-price_new {
            color: red;
        }

        .shop-item__add button[type="submit"] {
            padding: 15px 20px;
        }

        @media (max-width: 767px) {

        }
        /** Shop: Filter **/
        .shop__filter {
            margin-bottom: 40px;
        }
        .shop-filter__price [class*='col-'] {
            padding: 2px;
        }

        .shop-filter__color input[type="text"] {
            display: none;
        }
        .shop-filter__color label {
            width: 30px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 3px;
            cursor: pointer;
        }
        /** Shop: Sorting **/
        .shop__sorting {
            list-style: none;
            padding-left: 0;
            margin-bottom: 40px;
            margin-top: -20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            text-align: right;
        }
        .shop__sorting > li {
            display: inline-block;
        }
        .shop__sorting > li > a {
            display: block;
            padding: 20px 10px;
            margin-bottom: -1px;
            border-bottom: 2px solid transparent;
            color: #757575;
            -webkit-transition: all .05s linear;
            -o-transition: all .05s linear;
            transition: all .05s linear;
        }
        .shop__sorting > li > a:hover,
        .shop__sorting > li > a:focus {
            color: #333333;
            text-decoration: none;
        }
        .shop__sorting > li.active > a {
            color: #ed3e49;
            border-bottom-color: #ed3e49;
        }
        @media (max-width: 767px) {
            .shop__sorting {
                text-align: left;
                border-bottom: 0;
            }
            .shop__sorting > li {
                display: block;
            }
            .shop__sorting > li > a {
                padding: 10px 15px;
                margin-bottom: 10px;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }
            .shop__sorting > li.active > a {
                font-weight: 600;
            }
        }

        .checkout-total__block > .row > [class*="col-"] {
            padding: 40px 40px;
            border-right: 1px solid #e9e9e9;
            color: #aaa;
        }
        .checkout-total__block > .row > [class*="col-"]:last-child {
            border-right: 0;
            color: #333333;
        }
        @media (max-width: 767px) {

            .checkout-total__block > .row > [class*="col-"] {
                padding: 15px 20px;
                border: 0;
                border-top: 1px solid #e9e9e9;
            }
            .checkout-total__block > .row > [class*="col-"]:last-child {
                border-bottom: 1px solid #e9e9e9;
            }
        }

        .shop-conf__heading + p {
            margin-bottom: 100px;
        }


        /**
         * Forms
         */
        .form-control,
        .form-control:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
            outline: none;
        }
        /* Checkboxes */
        .checkbox input[type="checkbox"] {
            display: none;
        }
        .checkbox label {
            padding-left: 0;
        }
        .checkbox label:before {
            content: "";
            display: inline-block;
            vertical-align: middle;
            margin-right: 15px;
            width: 20px;
            height: 20px;
            line-height: 20px;
            background-color: #eee;
            text-align: center;
            font-family: "FontAwesome";
        }
        .checkbox input[type="checkbox"]:checked + label::before {
            content: "\f00c";
        }
        /* Radios */
        .radio input[type="radio"] {
            display: none;
        }
        .radio label {
            padding-left: 0;
        }
        .radio label:before {
            content: "";
            display: inline-block;
            vertical-align: middle;
            margin-right: 15px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 10px solid #eee;
            background-color: #333333;
        }
        .radio input[type="radio"]:checked + label:before {
            border-width: 7px;
        }
        .input_qty input[type="text"] {
            display: none;
        }
        .input_qty label {
            width: 100%;
            height: 40px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            line-height: 40px;
            text-align: center;
        }
        .input_qty label > span:not(.output) {
            width: 40px;
            height: 40px;
            float: left;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .input_qty label > span:not(.output):last-child {
            float: right;
            border-right: 0;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }
        .input_qty label > span:not(.output):hover {
            background-color: rgba(0, 0, 0, 0.02);
        }
        .input_qty label > output {
            display: inline-block;
            line-height: inherit;
            padding: 0;
        }
        .input_qty_sm label {
            width: 80px;
            height: 20px;
            border: 0;
            line-height: 20px;
            color: #ccc;
        }
        .input_qty_sm label > span:not(.output) {
            width: 20px;
            height: 20px;
            border: 0 !important;
        }
        .input_qty_sm label > span:not(.output):hover {
            background-color: transparent;
            color: #333333;
        }
        .input_qty_sm label output {
            color: #ccc;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <form>
                <div class="well">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search products..." aria-label="Search products..." aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
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
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Under $25
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        $25 to $50
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        $50 to $100
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        $100 to $300
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        $300 to $1000
                    </label>
                </div>

                <!-- Checkboxes -->
                <h3 class="headline mt-2">
                    <span>Brand</span>
                </h3>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Adidas
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Calvin Klein
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Columbia
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Tommy Hilfiger
                    </label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Not specified
                    </label>
                </div>
            </form>
        </div>

        <div class="col-sm-8 col-md-9">
            <!-- Filters -->
            <ul class="shop__sorting">
                <li class="active"><a href="#">Popular</a></li>
                <li><a href="#">Newest</a></li>
                <li><a href="#">Price (low)</a></li>
                <li><a href="#">Price (high)</a></li>
            </ul>

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="shop__thumb">
                        <a href="#">
                            <div class="shop-thumb__img">
                                <img src="https://via.placeholder.com/400x400/87CEFA/000000" class="img-responsive" alt="...">
                            </div>
                            <h5 class="shop-thumb__title">
                                Product Title
                            </h5>
                            <div class="shop-thumb__price">
                                <span class="shop-thumb-price_old">$80.99</span>
                                <span class="shop-thumb-price_new">$59.99</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="shop__thumb">
                        <a href="#">
                            <div class="shop-thumb__img">
                                <img src="https://via.placeholder.com/400x400/20B2AA/000000" class="img-responsive" alt="...">
                            </div>
                            <h5 class="shop-thumb__title">
                                Product Title
                            </h5>
                            <div class="shop-thumb__price">
                                $59.99
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="shop__thumb">
                        <a href="#">
                            <div class="shop-thumb__img">
                                <img src="https://via.placeholder.com/400x400/FFB6C1/000000" class="img-responsive" alt="...">
                            </div>
                            <h5 class="shop-thumb__title">
                                Product Title
                            </h5>
                            <div class="shop-thumb__price">
                                $59.99
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="shop__thumb">
                        <a href="#">
                            <div class="shop-thumb__img">
                                <img src="https://via.placeholder.com/400x400/87CEFA/000000" class="img-responsive" alt="...">
                            </div>
                            <h5 class="shop-thumb__title">
                                Product Title
                            </h5>
                            <div class="shop-thumb__price">
                                $59.99
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="shop__thumb">
                        <a href="#">
                            <div class="shop-thumb__img">
                                <img src="https://via.placeholder.com/400x400/FFA07A/000000" class="img-responsive" alt="...">
                            </div>
                            <h5 class="shop-thumb__title">
                                Product Title
                            </h5>
                            <div class="shop-thumb__price">
                                $59.99
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="shop__thumb">
                        <a href="#">
                            <div class="shop-thumb__img">
                                <img src="https://via.placeholder.com/400x400/48D1CC/000000" class="img-responsive" alt="...">
                            </div>
                            <h5 class="shop-thumb__title">
                                Product Title
                            </h5>
                            <div class="shop-thumb__price">
                                $59.99
                            </div>
                        </a>
                    </div>
                </div>
            </div> <!-- / .row -->

            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav> <!-- / .row -->

        </div> <!-- / .col-sm-8 -->
    </div> <!-- / .row -->
</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
