<?php

namespace App\Http\Controllers;

use App\Models\Shipment;

use App\Models\Represent;
use App\Models\Branch;

use Illuminate\Http\Request;
use App\Http\Requests\updateShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Interface\ShipmentInterface;


class ShipmentController extends Controller
{
    private $Shipment;
    
    public function __construct(ShipmentInterface $Shipment)
    {
          $this->Shipment = $Shipment;
    }
    

    public function index()
    {
        return $this->Shipment->index();

     }
   
   
    public function store(StoreShipmentRequest $request)
    {
      return $this->Shipment->store( $request);

    }


    public function update(Request $request, Shipment $shipment)

    {
        return $this->Shipment->update( $request ,$shipment );
  
      }
  
   

    
      
      public function print( $id)
      {       
        $Shipment=Shipment::findorfail($id);
        $Branch = Branch::latest()->get();
        $Represent = Represent::latest()->get();


          return view('print',compact('Shipment','Branch','Represent'));
  
      }

    

    

}
