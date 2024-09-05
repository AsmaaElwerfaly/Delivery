<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Represent;
use App\Models\Shipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countBranch=Branch::count();
        $countRepresent=Represent::count();
        $countShipment=Shipment::count();
        $sum_commossion=Shipment::sum("balance_commossion");
        $sum_order=Shipment::sum("balance_order");

 
 
 
 
        return view('home',compact('countBranch','countRepresent','countShipment','sum_commossion','sum_order'));
    }
}
