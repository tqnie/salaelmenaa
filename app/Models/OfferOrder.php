<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferOrder extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','counts','price','mobile','user_id','offer_id','status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
