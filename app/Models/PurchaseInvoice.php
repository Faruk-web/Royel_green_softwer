<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;
    public function senderSupplierInfo() {
        return $this->belongsTo(Supplier::class, 'supplier_id','id');
    }
    // production materials info
    public function production_materials() {
        return $this->hasMany(PurchaseMaterial::class, 'invioce_number','invioce_number');
    }

    public function purchase_materials() {
        return $this->hasMany(PurchaseMaterial::class, 'invioce_number','invioce_number');
    }

    

    


}
