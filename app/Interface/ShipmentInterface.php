<?php 
namespace App\Interface;
use App\Models\Branch;
use App\Models\Represent;
use App\Models\Shipment;
use Illuminate\Http\Request;

use App\Http\Requests\updateShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;


interface ShipmentInterface{


    public function index();

    public function store(StoreShipmentRequest $request);

    public function update(Request $request, Shipment $shipment);

   
    
       
}