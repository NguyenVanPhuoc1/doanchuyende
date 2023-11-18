<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function viewTinTuc(){
        $tintuc = News::orderBy('created_at', 'desc')->get();
        return view('frontend.tintuc', compact('tintuc'));
    }
    // xem chi tiết tin tức theo id
    public function viewDetailNews($id){
        try {
            $news = News::find($id);
            // dd($news);die();
            if (!$news) {
                abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
            }else{
                //tin tức liên quan
                $relatedNews = News::where('id', '!=', $id)
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            }
            return view('frontend.chitiettintuc',compact('news','relatedNews'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Xử lý ngoại lệ khi không tìm thấy sản phẩm
            abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
        }
    }
}
