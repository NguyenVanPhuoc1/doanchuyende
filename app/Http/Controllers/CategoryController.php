<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function viewCategory(){
        $category = News::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.qlidanhmuc', compact('category'));
    }
}
