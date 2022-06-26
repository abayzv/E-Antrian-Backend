<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Http\Resources\MechanicResource;
use App\Http\Resources\QueueResource;
use App\Http\Resources\VehicleResource;
use App\Models\Customer;
use App\Models\Mechanic;
use App\Models\Queue;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thisDay = Queue::whereDate('created_at', Carbon::today())->get()->count();
        $queue = Queue::get();
        $allQueue = QueueResource::collection(Queue::limit(4)->get());
        $mechanic = MechanicResource::collection(Mechanic::get());
        $chart = Queue::where('created_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                DB::raw('Day(created_at) as date'),
                DB::raw('COUNT(*) as "views"')
            ));
        $data = [
            "total_queue" => $queue->count(),
            "queue_today" => $thisDay,
            "mechanic" => $mechanic,
            "chart" => $chart,
            "last_servis" => $allQueue,
            "total_customer" => Customer::get()->count()
        ];
        return json_encode($data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
