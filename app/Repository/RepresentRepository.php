<?php

namespace App\Repository;
use App\Interface\RepresentInterface;
use App\Models\Represent;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Requests\StoreRepresentRequest;
use App\Http\Requests\updateRepresentRequest;



class RepresentRepository implements RepresentInterface {

    public function index()
    {
        $Represent = Represent::latest()->get();
        $Branch = Branch::latest()->get();

        return view('represent', compact('Represent','Branch'));
    }




    public function store(StoreRepresentRequest $request)
    {
        
        Represent::create([
            'name_represent' => $request->name_represent,
            'branche_id' => $request->branche_id,
            'code' => $request->code,
            'password' => $request->password,


        ]);
        session()->flash('Add', 'تم اضافة البيانات بنجاح ');
        return back();
    }

   
}