<?php

namespace App\Repository;

use App\Interface\ShipmentInterface;
use App\Models\Represent;
use App\Models\User;
use App\Models\Branch;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


use App\Http\Requests\updateShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Notifications\shipmentnotif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Expr\BinaryOp\Equal;

class ShipmentRepository implements ShipmentInterface {
    private $input_id;
    private $user_create;

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

    
    public function store(StoreShipmentRequest $request)
    {
        $Branch = Branch::latest()->get();
        $Represent = Represent::latest()->get();
        $Shipment=Shipment::latest()->get();

        $input = Shipment::create([
        'customer_code'=>$request->customer_code,
        'customer_name'=>$request->customer_name,
        'sender_name'=>$request->sender_name,
        'represent_name'=>$request->represent_name,
        'sender_num'=>$request->sender_num,
        'represent_num'=>$request->represent_num,
        'package_notes'=>$request->package_notes,
        'openable'=>$request->openable,
        'condition_cargo'=>$request->condition_cargo,
        'count_cargo'=>$request->count_cargo,
        'balance_cargo'=>$request->balance_cargo,
        'balance_commossion'=>$request->balance_commossion,
        'balance_order'=>$request->balance_order,
        'cargo_code'=>$request->cargo_code,
        'city'=>$request->city,
        'part'=>$request->part,
        'city_code'=>$request->city_code,
        'branche_id'=>$request->branche_id,
        'represent_id'=>$request->represent_id,
        'created_by' =>Auth::user()->id,

        ]);
      

     $users= User::select('*')->where('branche_id', $request->branche_id)->where('id','!=',auth()->user()->id)->get();

     $user_create = auth()->user()->name;
     $msg='   تم إضافة شحنة جديدة  ';
   
     Notification::send($users, new shipmentnotif($user_create,$msg,$input->package_notes)); 



        session()->flash('Add', 'تم اضافة البيانات بنجاح ');
        return redirect()->route('Shipment.index');
    }

    
    public function update(Request $request, Shipment $shipment)
    {
        
        $validatedData = $request->validate([
            'name_represent' => 'required',
                  
        ],[

            'name_represent.required' =>'ادخال الاسم ',
            
        ]);

        $id = Represent::where('name_represent', $request->name_represent)->first()->id;
        $input = Shipment::findOrFail($request->id);

        $input->represent_id = $id;

        $input->save();

        session()->flash('edit', 'تم تعديل البيانات بنجاج');
        return back();
    }

   

}