<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{
    use HasFactory;

    // production materials info
    public function production_materials() {
        return $this->hasMany(ProductionMaterial::class, 'invioce_number','invioce_number');
    }

    // production to product output info
    public function production_to_product_output() {
        return $this->hasMany(ProductionToProductOutput::class, 'invioce_number','invioce_number');
    }

    


}
