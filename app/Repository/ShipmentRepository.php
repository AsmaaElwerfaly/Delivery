<?php

namespace App\Repository;
use App\Interface\ShipmentInterface;
use App\Models\Represent;
use App\Models\User;
use App\Models\Branch;
use App\Models\Shipment;
use Illuminate\Http\Request;

use App\Http\Requests\updateShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Expr\BinaryOp\Equal;

class ShipmentRepository implements ShipmentInterface {


    public function index()
    {
        $Branch = Branch::latest()->get();

        $bracnh_rep = Represent::where('branche_id',auth()->user()->branche_id)->get();

        $Shipment=Shipment::where('branche_id',auth()->user()->branche_id)->get();

        return view('Shipment', compact('Branch','bracnh_rep','Shipment'));
    }

    
    public function store(StoreShipmentRequest $request)
    {
        $Branch = Branch::latest()->get();
        $Represent = Represent::latest()->get();
        $Shipment=Shipment::latest()->get();

       
        $input = $request->all();
        Shipment::create($input);

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
        $bracnh_rep = Represent::where('branche_id',auth()->user()->branche_id)->get();

        $input->represent_id = $id;

        $input->save();

        session()->flash('edit', 'تم تعديل البيانات بنجاج');
        return back();
    }

 

}