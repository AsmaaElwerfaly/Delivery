<?php

namespace App\Http\Controllers;

use App\Models\Represent;
use App\Models\Branch;

use Illuminate\Http\Request;
use App\Http\Requests\updateRepresentRequest;
use App\Http\Requests\StoreRepresentRequest;


class RepresentController2 extends Controller
{

    public function update(updateRepresentRequest $request, Represent $represent)
    {
        $id = Branch::where('branche_name', $request->branche_name)->first()->id;

        $input = Represent::findOrFail($request->id);

        $input->name_represent = $request->name_represent;
        $input->branche_id = $id;
        $input->code = $request->code;
        $input->password = $request->password;

        $input->save();

        session()->flash('edit', 'تم تعديل البيانات بنجاج');
        return back();

    }
    
    public function destroy(Request $request, Represent $represent)
    {
        Represent::findOrFail($request->id)->delete();

        $represent->delete();
        session()->flash('delete', 'تم حذف البيانات بنجاج');
        return back();

    }

    
   
}
