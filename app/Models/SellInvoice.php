<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellInvoice extends Model
{
    use HasFactory;

    public function clientInfo() {
        return $this->belongsTo(clients::class, 'client_id','id');
    }

    public function sold_products() {
        return $this->hasMany(SoldProducts::class, 'invioce_number','invioce_number');
    }


}
