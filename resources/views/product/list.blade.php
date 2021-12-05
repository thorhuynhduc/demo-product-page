<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<div class="container bg-light">
    <div class="row">
        <div class="col-12">
            <a class="navbar-brand">Product list</a>
            <nav class="navbar navbar-light bg-light justify-content-end">
                <a href="{{ route('product-create') }}" class="btn btn-success my-2 my-sm-0" type="submit">Add new product</a>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <div class="row">
                    <div class="col-3">
                        <label for="inputState">Brand:</label>
                        <select id="brand_id" name="brand_id" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="inputState">Price from:</label>
                        <input type="number" class="form-control" name="price_from" id="price_from" placeholder="From">
                    </div>
                    <div class="col-2">
                        <label for="inputState">Price to:</label>
                        <input type="number" class="form-control" name="price_to" id="price_to" placeholder="To">
                    </div>
                    <div class="col-4">
                        <label for="inputState">Name or Description:</label>
                        <input class="form-control mr-sm-2" type="text" name="keyword" value="{{ isset($param['keyword']) ? $param['keyword'] : '' }}" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col-1" style="margin-top: 31px;">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search product</button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('product-detail', ['productId' => $product->id]) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
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
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
