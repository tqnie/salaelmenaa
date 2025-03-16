<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'parent_id', 'order', 'type','name','slug'
    ];
    public function posts()
    {
        return $this->hasMany('App\Models\Post','category_id');
    }
    public function scopeGetProducts($query){
        return $query->where('parent_id',1)->get();
    }
    public function scopeGetBlogs($query){
        return $query->where('parent_id',5)->get();
    }
}
