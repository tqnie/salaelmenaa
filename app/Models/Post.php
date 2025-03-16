<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use AsSource, Filterable, Attachable;
    
    protected $fillable = [
        'title', 'category_id', 'author_id','seo_title','excerpt','body',
        'image', 'slug', 'meta_description','meta_keywords','featured','status'
    ];
    public function scopeSearch($query,$search){
        if($search!='')
        return   $query->where('title', 'Like', '%' . $search . '%')->orWhere('body', 'Like', '%' . $search . '%');

      }
    public function scopeIsActive()
    {
        return $this->where('status','PUBLISHED');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
