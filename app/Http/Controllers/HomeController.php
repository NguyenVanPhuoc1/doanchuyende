<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Policy;

class HomeController extends Controller
{
    //
    public function viewHome(){
        return view('frontend.trangchu');
    }

}
