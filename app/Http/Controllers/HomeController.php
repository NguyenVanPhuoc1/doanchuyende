<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class HomeController extends Controller
{
    //
    public function viewHome(){
        $listNews = $this->getNews();
        // dd($listNews);die();
        return view('frontend.trangchu',compact('listNews'));
    }

    // hiển thị tin tức
    public function getNews(){
        $news = News::orderBy('created_at', 'desc')
        ->where('noi_bat', true) 
        ->take(5) 
        ->get();
        return $news;
    }
}
