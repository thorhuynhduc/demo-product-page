<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        return view('brand.list');
    }

    public function create(Request $request)
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        return view('brand.create');
    }

    public function detail($brandId, Request $request)
    {
        return view('brand.edit');
    }

    public function update($brandId, Request $request)
    {
        return view('brand.edit');
    }

    public function delete($brandId)
    {
        return view('brand.edit');
    }
}
