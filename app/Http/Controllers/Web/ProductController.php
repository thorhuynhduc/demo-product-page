<?php

namespace App\Http\Controllers\Web;

use App\Criteria\ProductCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
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

        $products = $query->paginate(5);

        return view('product.list', compact('products', 'param'));
    }

    public function create(Request $request)
    {
        return view('product.create');
    }

    public function store(CreateProductRequest $request)
    {
        $data = $request->only([
            'brand_id',
            'name',
            'description',
            'price'
        ]);

        $data['brand_id']  = 1;
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

    public function detail($productId)
    {
        $product = Product::findOrFail($productId);

        return view('product.detail', ['product' => $product->load('images')]);
    }

    public function edit($productId, Request $request)
    {
        $product = Product::findOrFail($productId);

        return view('product.edit', ['product' => $product->load('images')]);
    }

    public function update($productId, UpdateProductRequest $request)
    {
        $data = $request->only([
            'brand_id',
            'name',
            'description',
            'price',
            'images_old',
        ]);

        $product = Product::findOrFail($productId);

        $product->name        = $data['name'];
        $product->description = $data['description'];
        $product->price       = $data['price'];
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
        return view('product.edit');
    }
}
