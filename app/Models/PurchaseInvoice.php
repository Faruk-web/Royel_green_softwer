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
    //invoice products
    public function invoice_products() {
        return $this->hasMany(PurchaseMaterial::class, 'invioce_number', 'invioce_number');
    }
}
