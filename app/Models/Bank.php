<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public function bank_info() {
        return $this->belongsTo(Banklist::class, 'bank_id', 'id');
    }
}
