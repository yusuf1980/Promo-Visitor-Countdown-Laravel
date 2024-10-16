<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'discount',
        'date',
        'finish_time',
        'code',
        'product',
    ];

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = (new Carbon($value))->format('Y-m-d');
    }

    public function getDateAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
}
