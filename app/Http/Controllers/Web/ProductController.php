<?php

namespace App\Http\Controllers\Web;

use App\Criteria\ProductCriteria;
use App\Enum\Pagination;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $param = $request->all();

        $query = Product::query();
        (new ProductCriteria($param))->apply($query);
        $query->with(['brand']);

        $products = $query->paginate(Pagination::PER_PAGE_DEFAULT);
        $brands   = Brand::all();

        return view('product.list', compact('products', 'param', 'brands'));
    }

    public function search(Request $request)
    {
        $param    = $request->all();
        $sortBy   = $param['sort_by'] ?? 'created_at';
        $sortType = $param['sort_type'] ?? 'desc';

        $query = Product::query();

        (new ProductCriteria($param))->apply($query);
        $query->with(['images']);
        $query->orderBy($sortBy, $sortType);

        $products = $query->paginate(Pagination::PER_PAGE_DEFAULT);

        return $this->responseOk($products);
    }

    public function create()
    {
        $brands = Brand::all();

        return view('product.create', compact('brands'));
    }

    public function store(CreateProductRequest $request)
    {
        $data = $request->only([
            'brand_id',
            'name',
            'description',
            'delivery',
            'warranty_information',
            'price'
        ]);

        $data['available'] = true;

        $product = Product::create($data);

        foreach ($request->file('images') as $image) {
            // Save the file locally in the storage/public/ folder under a new folder named /product
            $image->store('product', 'public');

            // Store the record, using the new file hashName which will be it's new filename identity.
            $imageProduct = new Image([
                "product_id" => $product->id,
                "name"       => $image->hashName(),
                "path"       => 'product/' . $image->hashName()
            ]);
            $imageProduct->save();
        }

        return $this->responseOk($product);
    }

    public function edit($productId, Request $request)
    {
        $product = Product::findOrFail($productId);
        $brands  = Brand::all();

        return view('product.edit', ['product' => $product->load('images', 'brand'), 'brands' => $brands]);
    }

    public function update($productId, UpdateProductRequest $request)
    {
        $data = $request->only([
            'brand_id',
            'name',
            'description',
            'delivery',
            'warranty_information',
            'price',
            'images_old',
        ]);

        $product = Product::findOrFail($productId);

        $product->name                 = $data['name'];
        $product->brand_id             = $data['brand_id'];
        $product->description          = $data['description'];
        $product->delivery             = $data['delivery'];
        $product->warranty_information = $data['warranty_information'];
        $product->price                = $data['price'];
        $product->save();

        if (!empty($data['images_old'])) {
            Image::where('product_id', $productId)->whereNotIn('name', $data['images_old'])->delete();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Save the file locally in the storage/public/ folder under a new folder named /product
                $image->store('product', 'public');

                // Store the record, using the new file hashName which will be it's new filename identity.
                $imageProduct = new Image([
                    "product_id" => $product->id,
                    "name"       => $image->hashName(),
                    "path"       => 'product/' . $image->hashName()
                ]);
                $imageProduct->save();
            }
        }

        return $this->responseOk($product);
    }

    public function delete($productId)
    {
        $product = Product::findOrFail($productId);

        $product->delete();

        return $this->responseOk(true);
    }
}
