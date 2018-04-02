<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Auction extends Model
{
    protected $fillable = ['car_id', 'buy_price', 'sell_price'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
