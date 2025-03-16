<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Subscription extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'package_id','status','user_id','quantity'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    } 
    public function package(){
        return $this->belongsTo(Package::class);
    }
    
}
