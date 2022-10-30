<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMaterial extends Model
{
    use HasFactory;
     // production materials info
          public function production_materials() {
        return $this->hasMany(ProductionMaterial::class, 'invioce_number','invioce_number');
    }

    public function senderSupplierInfo() {
        return $this->belongsTo(Material::class, 'material_id','id');
    }

    public function MaterialInfo() {
        return $this->belongsTo(Material::class, 'material_id','id');
    }



}
