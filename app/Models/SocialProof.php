<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SocialProof extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'product',
        'status',
        'purchased_at',
    ];

    public function setPurchasedAtAttribute($value)
    {
        $this->attributes['purchased_at'] = (new Carbon($value))->format('Y-m-d');
    }

    public function getPurchasedAtAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
}
