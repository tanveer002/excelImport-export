<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class WebController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('productpage', compact('products'));
    }

    public function storeProduct($id)
    {
        $products = Product::findOrFail($id);
        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $products->id => [
                'name' => $products->name,
                'quantity' => 1,
                'des' => $products->des,
                'price' => $products->price
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'add successfully');
        }

        if(isset($cart[$products->id])){
            $cart[$products->id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'add successfully');
        }

        $cart[$products->id] = [
            'name' => $products->name,
                'quantity' => 1,
                'des' => $products->des,
                'price' => $products->price
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'add successfully');
    }

    public function removeProduct($id)
    {
       
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Remove item from cart successfully');
    }

    public function cart()
    {
        
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function confirmOrder(Request $request)
    {
        $cart = session()->get('cart');
        
        $order_object = JSON.stringfy(json_encode($cart));
        // foreach($cart as $item){
        //     $item_data[] = $item['name'];
        // }
       dd($order_object);
    }
}
