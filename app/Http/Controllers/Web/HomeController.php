<?php

namespace App\Http\Controllers\Web;

use App\Criteria\ProductCriteria;
use App\Enum\Pagination;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\LoginRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(LoginRequest $request)
    {
        return $this->responseOk(Auth::attempt($request->validated()));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function index(Request $request)
    {
        $param = $request->all();
        $sortBy = $param['sort_by'] ?? 'created_at';
        $sortType = $param['sort_type'] ?? 'desc';

        $query = Product::query();

        (new ProductCriteria($param))->apply($query);
        $query->with(['images']);
        $query->orderBy($sortBy, $sortType);

        $products = $query->paginate(Pagination::PER_PAGE_DEFAULT);
        $brands = Brand::all();

        return view('home', compact('products', 'param', 'brands'));
    }

    public function search(Request $request)
    {
        $param = $request->all();
        $sortBy = $param['sort_by'] ?? 'created_at';
        $sortType = $param['sort_type'] ?? 'desc';

        $query = Product::query();

        (new ProductCriteria($param))->apply($query);
        $query->with(['images']);
        $query->orderBy($sortBy, $sortType);

        $products = $query->paginate(Pagination::PER_PAGE_DEFAULT);

        return $this->responseOk($products);
    }

    public function detail($productId)
    {
        $product = Product::findOrFail($productId);

        return view('product.detail', ['product' => $product->load('images')]);
    }

    public function cart(Request $request)
    {
        return view('cart');
    }
}
