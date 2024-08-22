<?php 
namespace App\Interface;
use Illuminate\Http\Request;

use App\Http\Requests\StoreRepresentRequest;
use App\Http\Requests\updateRepresentRequest;
use App\Models\Represent;

interface RepresentInterface{

    public function index();

    public function store(StoreRepresentRequest $request);

    
    
}