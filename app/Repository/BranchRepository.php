<?php

namespace App\Repository;
use App\Interface\BranchInterface;

use App\Models\Branch;
use App\Models\Represent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\updateBranchRequest;



class BranchRepository implements BranchInterface{

    public function index()
    {
        $Branch = Branch::latest()->get();
        return view('Branch', compact('Branch'));
    }

    
    public function store(StoreBranchRequest $request)
    {
       

            Branch::create([
                'branche_name' => $request->branche_name,
                'code' => $request->code,
                'password' => $request->password,

    
            ]);
            session()->flash('Add', 'تم اضافة البيانات بنجاح ');
            return redirect('/Branch');
       
    }


    public function update(updateBranchRequest $request, Branch $branch)
    {
        
        $input = Branch::findOrFail($request->id);
        $input->branche_name = $request->branche_name;
        $input->code = $request->code;
        $input->password = $request->password;

        $input->save();



        session()->flash('edit', 'تم تعديل البيانات بنجاج');
        return redirect('/Branch');
    }

    public function destroy(Request $request, Represent $represent)
    {
        Branch::findOrFail($request->id)->delete();

        $represent->delete();
        session()->flash('delete', 'تم حذف البيانات بنجاج');
        return back();

    }

}