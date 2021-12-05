<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{mix('css/app.css')}}" />
    <style>
        .error {color: red;}

        .img-preview {
            width: 180px;
            margin-left: 5px;
            margin-bottom: 8px;
        }

        .form-inline .form-control.custom-file-upload {
            border: 1px solid #ccc;

            padding: 6px 12px;
            cursor: pointer;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }

        .file-upload {
            height: 30px !important;
            width: 130px !important;
        }

        .wrap-input-container {
            display: inline-block;
            position: relative;
            overflow: hidden;
            height: 40px;
            margin-top: 2px;
        }
        .wrap-input-container input {
            position: absolute;
            font-size: 400px;
            opacity: 0;
            z-index: 1;
            top: 0;
            left: 0;
        }

        input[type="file"] {
            display: block;
        }
        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>
</head>
<body>
<div class="container bg-light">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light justify-content-end">
                <form class="form-inline">
                    <a class="nav-link active" href="#">Product List</a>
                </form>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{!! route('product-store') !!}" method="POST" id="updateProduct" enctype="multipart/form-data">
                <input type="hidden" id="product_id" value="{{ $product->id }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}" placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" placeholder="Enter price">
                </div>
                <div class="form-group">
                    <div class="field" align="left">
                        <h6>Upload product images</h6>
                        <div class="col-md-6">
                            <div data-role="dynamic-fields">
                                @foreach ($product->images as $image)
                                    <div class="form-inline form-row">
                                        <!-- file upload start-->
                                        <div class="mb-2 mr-sm-2 col-sm-5 wrap-input-container">
                                            <label class="custom-file-upload form-control">
                                                <i class="fa fa-cloud-upload"></i> {{ $image->name }}
                                            </label>
                                            <input class="file-upload" name="images[]" type="file" data-name="{{ $image->name }}">
                                        </div>
                                        <!-- file upload ends-->

                                        <button class="btn btn-sm btn-danger  mb-2" data-role="remove">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary ml-1 mb-2" data-role="add">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <img class="img-preview" src="{{ env('APP_URL').':'.env('PROJECT_PORT').'/storage/'.$image->path }}" alt="{{ $image->name }}">
                                    </div>
                                @endforeach
                            </div>  <!-- /div[data-role="dynamic-fields"] -->
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit Edit Product</button>
            </form>
        </div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}" ></script>
<script src="{{asset('js/lib/jquery-validation.js')}}" ></script>
<script src="{{asset('js/product/update.js')}}" ></script>
</html>
