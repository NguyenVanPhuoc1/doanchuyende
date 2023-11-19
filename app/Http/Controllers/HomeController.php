<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function viewHome(){
        $category = $this->getCategory();
        return view('frontend.trangchu',compact('category'));
    }
    // lấy tất cả các danh mục
    public function getCategory(){
        $category = Category::all();
        return $category;
    }
    //lấy sản phẩm theo danh mục

    public function getProductbyCate($categoryId){
        $products = Product::orderBy('created_at', 'desc')->where('cate_id', $categoryId)->take(8)->get();
        // Trả về dữ liệu JSON hoặc view tùy thuộc vào yêu cầu của bạn
        return response()->json(['products' => $products]);
    }

    // tìm kiếm sản phẩm
    public function searchProduct(Request $request){
        $request->validate([
            'searchProduct' => 'required|max:100',
        ]);
        $searchTerm = $request->input('searchProduct');
        if($searchTerm != ''){
            $products = DB::table('product')
            ->where('name', 'LIKE', '%'.$searchTerm.'%')
            ->paginate(12);
            if($products->isEmpty()){
                // Nếu không tìm thấy sản phẩm, có thể chuyển thông báo hoặc thực hiện xử lý khác
                $products = "Không tìm thấy sản phẩm";
            }
            
        }else{
            $products = "Không tìm thấy sản phẩm";
        }
        // var_dump($products);die();
        return view('frontend.sanpham',compact('products'));
    }

}
