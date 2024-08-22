<?php 
namespace App\Interface;
use App\Models\Branch;
use App\Models\Represent;

use Illuminate\Http\Request;

use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\updateBranchRequest;

interface BranchInterface{

    public function index();
    
    public function store(StoreBranchRequest $request);

    public function update(updateBranchRequest $request, Branch $branch);
    public function destroy(Request $request, Represent $represent);


}

//signature  Prototype