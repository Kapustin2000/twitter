<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
        /**
         *
         *Traffic table = [ 'user_id', 'profile_user_id, device    ]
         *
         */
       $traffic = Traffic::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            
            //Days: { views : 50, day: Monday}
            ->selectRaw("COUNT(id) views, DATE_FORMAT(created_at, '%W') date")
            ->groupBy('date')

           //Devices: { device: IOS, count : 4},  { device: android, count : 7}
           ->selectRaw("COUNT(id) as count, device")
           ->groupBy('device')


//           //MalePercent: 100%, FemalePercent: 0%
//           ->leftJoin('users', 'users.id', 'traffic.user_id')
//           ->selectRaw("SUM(IF(sex=1,1,0)) / COUNT(*) * 100 AS MalePercent, SUM(IF(sex=2,1,0)) / COUNT(*) * 100 AS FemalePercent")
//           ->groupBy('sex')

           ->get();

        dd($traffic);
        /**
         *

        What I want to receive in the end

         Collection {
               MalePerecent: 100%,
               FemalePerecent: 50%,
               Views: { day : Monday, views :50}, {day: Thursday, views : 40},
               Devices : {device: IOS, count : 7}
         }
        
         **/
        
 
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
