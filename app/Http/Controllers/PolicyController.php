<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function viewChinhSach(){
        $policy = Policy::orderBy('created_at', 'desc')->get();
        return view('frontend.chinhsach', compact('chinhsach'));
    }

    public function viewDetailPolicy($id){
        try {
            $policy = Policy::find($id);
            if (!$policy) {
                abort(404); // Hiển thị trang lỗi 
            }else{
                $relatedpolicy = Policy::where('id', '!=', $id)
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            }
            return view('frontend.chitietchinhsach',compact('policy','relatedpolicy'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
         
            abort(404); // Hiển thị trang lỗi
        }
    }
}
