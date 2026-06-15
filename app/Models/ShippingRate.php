<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingRate extends Model
{
    protected $fillable = [
        'shipping_zone_id',
        'weight_from_grams',
        'weight_to_grams',
        'amount_cents',
        'notes',
    ];

    public function shippingZone(): BelongsTo
    {
        return $this->belongsTo(ShippingZone::class);
    }
}

