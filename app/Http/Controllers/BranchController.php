<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Represent;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\updateBranchRequest;
use App\Interface\BranchInterface;

class BranchController extends Controller
{

    private $branch;
    
    public function __construct(BranchInterface $branch)
    {
          $this->branch = $branch;
    }
    

    public function index(){
        return $this->branch->index();

  }

  public function store(StoreBranchRequest $request){
    return $this->branch->store($request);

}
    
    public function update(updateBranchRequest $request, Branch $branch)
    {
        
        return $this->branch->update($request,$branch );

    }
    
    public function destroy(Request $request, Represent $represent)
    {
        return $this->branch->destroy($request,$represent );

    }
   
    
  
}
