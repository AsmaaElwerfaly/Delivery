<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

  
    protected $guarded = [];


    public function represents()
    {
        return $this->HasMany(Represent::class);
    }

      
    public function shipments()
    {
        return $this->HasMany(Shipment::class);
    }

    public function users()
    {
        return $this->HasMany(User::class);
    }
}
