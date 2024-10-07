<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shipment;

use App\Models\Represent;
use App\Models\Branch;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;

class shipmentdetialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $notifications=DatabaseNotification::findorFail($id);
        $getid=DB::table('notifications')->where('id',$id)->pluck('id');
        DB::table('notifications')->where('id',$getid)->update(['read_at'=>now()]);
        return redirect()->route('Shipment.index');
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
