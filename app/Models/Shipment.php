<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;


 
    protected $guarded = [];

    

    public function branches()
    {
        return $this->belongsTo(Branch::class,'branche_id');
    }


    public function represents()
    {
        return $this->belongsTo(Represent::class,'represent_id');


    }

  

}
