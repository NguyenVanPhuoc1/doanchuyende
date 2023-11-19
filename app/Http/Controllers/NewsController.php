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
    public function viewDetailNews(Request $request, $id){
        $url = $request->fullUrl();
        try {
            $news = News::find($id);
            // dd($news);die();
            if(str_contains($url, 'quanlibaiviet') ){
                if (!$news) {
                    abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
                }
                return view('admin.crudtintuc',compact('news'));
            }else{
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
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Xử lý ngoại lệ khi không tìm thấy sản phẩm
            abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
        }

    }
    // view admin quản lí tin tức
    public function viewAdminTintuc(Request $request){
        $url = $request->fullUrl();
        if(str_contains($url, 'keyword')){
            $request->validate([
                'keyword' => 'required|max:100',
            ]);
            $keyword = $request->input('keyword');
            $newsList = News::where('news_name', 'like', '%' . $keyword . '%')->orderBy('created_at', 'desc')->paginate(5);
        }else{
            $newsList = News::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('admin.qlitintuc', compact('newsList'));
    }
    // hàm tìm tiếm bài viết tin tức


    //hàm xem trang thêm mới tin tức
    public function viewPageaddNews(){
        return view('admin.crudtintuc');
    }

    //hàm thêm mới tin tức
    //tạo data dữ liệu
    public function create(array $data)
    {
        return News::create([
            'news_name' => $data['news_name'],
            'news_desc' => $data['contentvi'],
            'news_image' => $data['fileToUpload'],
            'cus_id' => '0',
            'noi_bat' => true,
        ]);
    }     
    //thêm sản phẩm
    public function AddNews(Request $request)
    { 
        $request->validate([
            'news_name' => 'required|max:500',
        ]);
        if($request->hasFile('fileToUpload')){
            $file = $request->file('fileToUpload');
            $filename = $file->getClientOriginalName();
            $file->move('front/public/image/',$filename);
        }else{
            $filename = 'noimage.png';
        }
        $data = $request->all();
        $data['fileToUpload'] = $filename;
        $news = $this->create($data);
        return redirect('/admin/quanlibaiviet/tintuc')->withSuccess('Thêm Thành công!');
    }
}
