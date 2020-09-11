<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        return view('users.cart.index');

    }

    public function create(Product $product)
    {
        if (session()->has('cart'))
        {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', trans('messages.cart.success'));

    }

    public function show()
    {

        if (session()->has('cart'))
        {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        return view('users.cart.index', compact('cart'));
    }


    public function destroy(Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);

        if ($cart->totalQuantity <= 0)
        {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Product was removed');

    }

}
