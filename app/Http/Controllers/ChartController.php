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
        $endDate = Carbon::now();
        $modifiedData = "";
        switch($giatri){
            case '7day':
                $startDate = Carbon::now()->subDays(7);
                $modifiedData = $this->createArray($startDate, $endDate);

                break;
            case '30day':
                $startDate = Carbon::now()->subDays(30);
                $modifiedData = $this->createArray($startDate, $endDate);
                break;
            // case '1year':
            //     $modifiedData = $this-> ttThang();
            //     break;
            default:
                $startDate = Carbon::now()->subDays(7);
                $modifiedData = $this->createArray($startDate, $endDate);
                break;
            }
        
        // dd(Analytics::fetchTotalVisitorsAndPageViews(Period::days(7)));
        return view('admin.trangchu',compact('modifiedData'));
    }

    public function createArray($startDate, $endDate){
        // Lấy dữ liệu từ Google Analytics
        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDate));
        // Tạo mảng chứa tất cả các ngày trong khoảng thời gian
        $allDates = [];
        $currentDate = clone $startDate;
        
        while ($currentDate <= $endDate) {
            $allDates[] = $currentDate->toDateString();
            $currentDate->addDay();
        }
        $numberOfDays = $endDate->diffInDays($startDate) + 1;
        // Tạo mảng dữ liệu để chứa thông tin từ Google Analytics
        $data = [];
        for ($i = $numberOfDays; $i > 0; $i--) {
            $date = $allDates[$i - 1]; // Chú ý về chỉ số mảng bắt đầu từ 0
        
            $data[] = [
                'date' => Carbon::parse($date),
                'activeUsers' => 0,
                'screenPageViews' => 0,
            ];
            
            // Nếu có dữ liệu từ Google Analytics cho ngày đó, ghi đè giá trị mặc định
            if (isset($analyticsData[$i-1])) {
                $data[$i - 1]['activeUsers'] = $analyticsData[$i-1]['activeUsers'];
                $data[$i - 1]['screenPageViews'] = $analyticsData[$i-1]['screenPageViews'];
            }
        }
        return $data;

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
