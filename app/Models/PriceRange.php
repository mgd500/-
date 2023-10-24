<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    use HasFactory;

    public function spot()
    {
        return $this->hasMany(Spot::class);
    }
}
