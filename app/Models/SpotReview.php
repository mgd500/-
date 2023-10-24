<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotReview extends Model
{
    protected $table = 'spot_reviews';
    protected $fillable = [
        'spot_id',
        'comment',
    ];
    
    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
