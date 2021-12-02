<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('product.list');
    }

    public function create(Request $request)
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        return view('product.create');
    }

    public function detail($productId, Request $request)
    {
        return view('product.edit');
    }

    public function update($productId, Request $request)
    {
        return view('product.edit');
    }

    public function delete($productId)
    {
        return view('product.edit');
    }
}
