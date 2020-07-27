<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use phpDocumentor\Reflection\Types\Collection;

class TrafficController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Redis::zRangeByScore('user.'.user()->id.'.visited', strtotime('monday this week'), strtotime('sunday this week'));

        dd($visits);

//       $report = collect(
//            [
//                'views' => Traffic::whereBetween('traffic.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
//                    ->selectRaw("COUNT(traffic.id) views, DATE_FORMAT(traffic.created_at, '%W') date")
//                    ->groupBy('date')->get(),
//                
//                'sex' =>  Traffic::whereBetween('traffic.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
//                    ->leftJoin('users', 'users.id', 'traffic.user_id')
//                    ->selectRaw("SUM(IF(sex=1,1,0)) / COUNT(*) * 100 AS MalePercent, SUM(IF(sex=2,1,0)) / COUNT(*) * 100 AS FemalePercent")
//                    ->groupBy('sex'),
//                'devices' => Traffic::whereBetween('traffic.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
//                    ->selectRaw("COUNT(id) as count, device")
//                    ->groupBy('device')
//            ]
//        );
//        
//        
//        dd($report);
       
 
    }









    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function show(Traffic $traffic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function edit(Traffic $traffic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traffic $traffic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traffic $traffic)
    {
        //
    }
}
