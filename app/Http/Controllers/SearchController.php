<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Represent;
use App\Models\Branch;


class SearchController extends Controller
{
   
    public function index()
    {
        
        $Branch = Branch::latest()->get();
        $bracnh_rep = Represent::all();



        if(  auth()->user()->branche_id == 1)
        {
       
            $Shipment=Shipment::latest()->get();

        }
        else{

           $Shipment=Shipment::where('branche_id',auth()->user()->branche_id)->get();

        }
        return view('Shipment', compact('Branch','bracnh_rep','Shipment'));


    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {  
        // $bracnh_rep = Represent::all();

        $bracnh_rep = Represent::latest()->get();
        $Branch = Branch::latest()->get();
    $Shipment =Shipment::latest()->get();

        if(  auth()->user()->branche_id == 1)
        {
      
       
            $Shipment=Shipment::select('*')->where('cargo_code', $request->cargo_code)->get();
            $cargo_code=$request->cargo_code;
            return view('shipment',compact('Shipment','Branch','bracnh_rep'));
        }
        else{
            
      
        $Shipment=Shipment::select('*')->where('cargo_code', $request->cargo_code)->where('branche_id',auth()->user()->branche_id)->get();
        $cargo_code=$request->cargo_code;
        return view('shipment',compact('Shipment','Branch','bracnh_rep'));
        }
    }


   
    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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
