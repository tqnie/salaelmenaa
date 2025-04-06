<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Product extends Model
{
    use AsSource, Filterable, Attachable;
    protected $fillable = [
        'title','body','views','image','slug','status'
     ];

     public function scopeActive($query){
        return $query->where('status','active');
    }
    public function offers(){
        return $this->hasMany(Offer::class);
    }
    public function productUser(){
        return $this->hasOne(ProductUser::class);
    }
    public function productUsers(){
        return $this->hasMany(ProductUser::class);
    }
    
}
