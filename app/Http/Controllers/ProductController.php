<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.sanpham', ['products' => $products]);
    }

    public function show($id)
    {
    $product = Product::findOrFail($id);
    return view('frontend.chitietsanpham', ['product' => $product]);
    }

    public function indexAdmin()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.qlsanpham', ['products' => $products], ['categories' => $categories]);
    }
}