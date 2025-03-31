<?php

namespace App\Models;

use App\Notifications\InvoiceNotifi;
use App\Settings\SettingProfits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Offer extends Model
{
    use HasFactory , AsSource, Filterable, Attachable;
    
    protected $fillable = ['id','title','body','views','image','video','user_id','to_user_id','product_id','type','status'];
    
    public function scopeSearch($query, $search)
    {
       
            return $query->when($search,function($query)use($search){
                if($search)
                return $query->where('title','like','%'.$search.'%');
            });
      
    }
    public function scopeActive($query)
    {
        return $query->where('status','approved');
    }
    public function scopeProduct($query, $productId)
    {
        return $query->where('product_id',$productId);
    }
    public function scopeToUser($query, $userId)
    {
        return $query->where('to_user_id',$userId);
    }
    public function scopeMy($query, $userId)
    {
        return $query->where('user_id',$userId);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function toUser()
    {
        return $this->belongsTo(User::class,'to_user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function approve()
    { 
      $this->status='ACCEPT'; 
      $this->save(); 
    }

}
