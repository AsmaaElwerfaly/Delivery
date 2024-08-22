<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Represent extends Model
{
    use HasFactory;

    
    protected $guarded = [];

    

    public function branches()
    {
        return $this->belongsTo(Branch::class,'branche_id');
    }



    public function shipments()
    {
        return $this->HasMany(Shipment::class);
    }

}
