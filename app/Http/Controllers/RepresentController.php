<?php

namespace App\Http\Controllers;

use App\Models\Represent;
use App\Models\Branch;

use Illuminate\Http\Request;
use App\Http\Requests\updateRepresentRequest;
use App\Http\Requests\StoreRepresentRequest;
use App\Interface\RepresentInterface;

class RepresentController extends Controller
{
   
   
    private $represent;
    
    public function __construct(RepresentInterface $represent)
    {
          $this->represent = $represent;
    }
    
    public function index(){

        return $this->represent->index();
    }

    public function store(StoreRepresentRequest $request){

        return $this->represent->store($request);
    }
   
    


}
