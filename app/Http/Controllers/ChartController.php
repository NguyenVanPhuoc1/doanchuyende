<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class ChartController extends Controller
{
    //
    public function viewChart(Request $request){
        $giatri = $request->get('gia_tri');
        // dd($giatri);die();
        $modifiedData = "";
        switch($giatri){
            case '7day':
                //$modifiedData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7),7);
                break;
            case '30day':
                //$modifiedData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30),30);
                break;
            // case '1year':
            //     $modifiedData = $this-> ttThang();
            //     break;
            default:
                //$modifiedData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7),7);
                break;
            }
         
        // dd($modifiedData);
        return view('admin.trangchu',compact('modifiedData'));
    }
    // public function ttThang()
    // {
    //     $date = now();
    //     $year = $date->year;
    //     $monthlyData = [];

    //     for ($month = 1; $month <= 12; $month++) {
    //         $startDate = Carbon::create($year, $month, 1)->startOfMonth();
    //         $endDate = $startDate->copy()->endOfMonth();
    //         // dd(Period::create($startDate, $endDate));
    //         $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30));
    //         // dd($analyticsData);
    //         $monthlyData[$month] = $analyticsData;
    //         // dd($month);
    //     }
    //     return $analyticsData;
    // }
}
