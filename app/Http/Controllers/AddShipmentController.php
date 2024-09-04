<?php

namespace App\Http\Controllers;

use App\Models\Shipment;

use App\Models\Represent;
use App\Models\Branch;

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



    public function update(Request $request, Shipment $shipment)
    {
        
        $validatedData = $request->validate([
            'condition_cargo' => 'required',
                  
        ],[

            'condition_cargo.required' =>'ادخال الاسم ',
            
        ]);

        $input = Shipment::findOrFail($request->id);

        $input->condition_cargo = $request->condition_cargo;

        $input->save();

        session()->flash('edit', 'تم تعديل البيانات بنجاج');
        return back();
    }
    
    
    

}
