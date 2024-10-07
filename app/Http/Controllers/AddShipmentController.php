<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\User;
use App\Notifications\updateshipmentnotif;

use App\Models\Represent;
use App\Models\Branch;
use App\Http\Requests\updateShipmentRequest;
use Illuminate\Support\Facades\Notification;


use Illuminate\Http\Request;

class AddShipmentController extends Controller
{
  
    public function index()
    {
        $Represent = Represent::latest()->get();
        $Branch = Branch::latest()->get();
        $Shipment=Shipment::latest()->get();

        return view('shipmentadd',compact('Represent','Branch','Shipment'));
    }



    public function update(updateShipmentRequest $request, Shipment $shipment)
    {
        
        $id = Branch::where('branche_name', $request->branche_name)->first()->id;

        $input = Shipment::findOrFail($request->id);


        $input->branche_id = $id;

        $input->condition_cargo = $request->condition_cargo;
        $input->customer_code = $request->customer_code;
        $input->customer_name = $request->customer_name;
        $input->sender_name = $request->sender_name;
        $input->represent_name = $request->represent_name;
        $input->sender_num = $request->sender_num;
        $input->represent_num = $request->represent_num;
        $input->package_notes = $request->package_notes;
        $input->openable = $request->openable;
        $input->count_cargo = $request->count_cargo;
        $input->balance_cargo = $request->balance_cargo;
        $input->balance_commossion = $request->balance_commossion;
        $input->balance_order = $request->balance_order;
        $input->cargo_code = $request->cargo_code;
        $input->city = $request->city;
        $input->part = $request->part;
        $input->city_code = $request->city_code;

         $input->save();

           


         if(   $request->condition_cargo == "ارجاع مبيعات" )
{
            $users= User::select('*')->where('id',$input->created_by)->get();

            $user_create = auth()->user()->name;
            $msg='طلب مرتجع';
            Notification::send($users, new updateshipmentnotif($input->id,$user_create,$msg)); 
}      
        session()->flash('edit', 'تم تعديل البيانات بنجاج');
        return back();
    }
    

}
