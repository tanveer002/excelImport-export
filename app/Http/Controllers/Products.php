<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class Products extends Controller
{
    public function index()
    {
       
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
       $product = new Product();
       $product->name = $request->pname;
       $product->des = $request->pdes;
       $product->price = $request->price;
       $product->save();
       return back();
    }
}
