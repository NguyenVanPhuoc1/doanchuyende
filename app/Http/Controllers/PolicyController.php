<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function viewChinhSach(){
        $policy = Policy::orderBy('created_at', 'desc')->get();
        return view('frontend.chinhsach', compact('policy'));
    }

    public function viewDetailPolicy(Request $request, $id){
        $url = $request->fullUrl();
        try {
            $policy = Policy::find($id);
            // dd($news);die();
            if(str_contains($url, 'quanlichinhsach') ){
                if (!$policy) {
                    abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
                }
                return view('admin.crudchinhsach',compact('policy'));
            }else{
                if (!$policy) {
                    abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
                }else{
                    //tin tức liên quan
                    $relatedPolicys = Policy::where('id', '!=', $id)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();
                }
                return view('frontend.chitietchinhsach',compact('policy','relatedPolicys'));
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Xử lý ngoại lệ khi không tìm thấy sản phẩm
            abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
        }

    }

    // view admin quản lí chính sách
    public function viewAdminChinhSach(Request $request){
        $url = $request->fullUrl();
        if(str_contains($url, 'keyword')){
            $request->validate([
                'keyword' => 'required|max:100',
            ]);
            $keyword = $request->input('keyword');
            $policysList = Policy::where('poli_name', 'like', '%' . $keyword . '%')->orderBy('created_at', 'desc')->paginate(5);
        }else{
            $policysList = Policy::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('admin.qlichinhsach', compact('policysList'));
    }
    // hàm tìm tiếm bài viết tin tức


    //hàm xem trang thêm mới tin tức
    public function viewPageaddPoli(){
        return view('admin.crudchinhsach');
    }

    //hàm thêm mới tin tức
    //tạo data dữ liệu
    public function create(array $data)
    {
        return Policy::create([
            'poli_name' => $data['poli_name'],
            'poli_desc' => $data['contentvi'],
            'poli_image' => $data['fileToUpload'],
            'noi_bat' => true,
        ]);
    }     
    //thêm sản phẩm
    public function AddPolicys(Request $request)
    { 
        $request->validate([
            'poli_name' => 'required|max:500',
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
        $policy = $this->create($data);
        return redirect('/admin/quanlichinhsach/chinhsach')->withSuccess('Thêm Thành công!');
    }

    //sửa news
    public function updatePolicys(Request $request){
        // Lấy ID từ request
        $policyId = $request->input('poli_id');
        // Kiểm tra xem tin tức có tồn tại không
        $policy = Policy::find($policyId);
        if(!$policy){
            $request->validate([
                'poli_name' => 'required|max:500',
            ]);
            $policy->poli_name = $request->input('poli_name');
            $Policy->poli_desc = $request->input('contentvi');
            if($request->hasFile('fileToUpload')){
                $file = $request->file('fileToUpload');
                $filename = $file->getClientOriginalName();
                $file->move('front/public/image/',$filename);
            }else{
                $filename = 'noimage.png';
            }
            $policy->save();
        }
        return redirect()->route('admin-updatePolicys')->withSuccess('Sửa Thành công!');
    }

    //xóa sản phẩm
    public function deletePolicys(Request $request){
        $type = $request->input('delete_type', 'single');
        // dd($request->all());
        if($type == 'single'){
            // Xóa một bài viết
            $id = $request->input('selected_ids')[0];
            // dd($id);die();
            $policy= Policy::findOrFail($id);
            $policy->delete();
        } elseif ($type == 'multiple') {
            // Xóa nhiều bài viết (nếu có các selected_ids được chọn)
            $selectedIds = $request->input('selected_ids', []);

            if (!empty($selectedIds)) {
                // Xóa các bài viết với các ID đã chọn
                Policy::whereIn('id', $selectedIds)->delete();
            }
        } elseif ($type == 'all') {
            // Xóa tất cả bài viết
            Policy::truncate(); 
        } else {
            abort(404);
        }

        return redirect('/admin/quanlichinhsach/chinhsach')->withSuccess('Xóa Thành công!');
    }

    // xóa theo id
    public function deletePolicybyId($id){
        $policy = Policy::findOrFail($id);
        $policy->delete();
        return redirect('/admin/quanlichinhsach/chinhsach')->withSuccess('Xóa Thành công!');
    }
}
