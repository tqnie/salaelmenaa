<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ProductUser extends Model
{
    use AsSource, Filterable, Attachable;
    protected $fillable = [
        'type','product_id','user_id'
     ];

     public function scopeType($query,$type){
        return $query->where('type',$type);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
   
}
