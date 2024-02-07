<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_id', 'ip', 'detail', 'launch_date'
    ];

    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }
}
