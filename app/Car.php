<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = ['make', 'model', 'year', 'price'];
    public $timestamps = false;

    public function auctions(): HasMany
    {
        return $this->hasMany(Auction::class);
    }
}
