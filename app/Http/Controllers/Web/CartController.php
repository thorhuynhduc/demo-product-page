<?php

namespace App\Http\Controllers\Web;

use App\Enum\Cart;
use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $keyCart = Common::getCartKey($request->userAgent());
        $cart    = Cache::get($keyCart);
        $sum     = Common::getSumPriceCart($cart);

        return view('cart', compact('cart', 'sum'));
    }

    public function add(AddToCartRequest $request)
    {
        $data    = $request->validated();
        $keyCart = Common::getCartKey($request->userAgent());

        $carts = Cache::get($keyCart);
        if (is_array($carts)) {
            $isExisted = in_array($data['product_id'], array_column($carts, 'product_id'));
            if (empty($isExisted)) {
                $carts[] = $data;
            } else {
                foreach ($carts as $key => $cartItem) {
                    if ($cartItem['product_id'] == $data['product_id']) {
                        $carts[$key]['quantity'] = $carts[$key]['quantity'] + $data['quantity'];
                        break;
                    }
                }
            }
        } else {
            if (empty($carts)) {
                $carts[] = $data;
            }
        }

        Cache::put($keyCart, $carts, now()->addMinutes(Cart::TIME_LIVE_DEFAULT));

        return $this->responseOk(Cache::get($keyCart));
    }

    public function update($productId, UpdateCartRequest $request)
    {
        $data    = $request->validated();
        $keyCart = Common::getCartKey($request->userAgent());

        $carts = Cache::get($keyCart);
        if (is_array($carts)) {
            foreach ($carts as $key => $cartItem) {
                if ($carts[$key]['product_id'] == $productId) {
                    $carts[$key]['quantity'] = $data['quantity'];
                }
            }
        }

        if (empty($carts)) {
            $carts[] = $data;
        }

        Cache::put($keyCart, $carts, now()->addMinutes(Cart::TIME_LIVE_DEFAULT));

        return $this->responseOk(Cache::get($keyCart));
    }

    public function remove($productId, Request $request)
    {
        $keyCart = Common::getCartKey($request->userAgent());
        $cart    = Cache::get($keyCart);

        if (empty($cart)) {
            return $this->responseOk(0);
        }

        if (is_array($cart)) {
            foreach ($cart as $key => $cartItem) {
                if ($cartItem['product_id'] == $productId) {
                    unset($cart[$key]);
                    break;
                }
            }
        }

        Cache::put($keyCart, $cart, now()->addMinutes(Cart::TIME_LIVE_DEFAULT));
        $sum = Common::getSumPriceCart($cart);

        return $this->responseOk($sum);
    }
}
