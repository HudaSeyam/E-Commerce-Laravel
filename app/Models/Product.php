<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $table="product";
    protected $date=['deleted_at'];
    
    protected $fillable = [
        'title',
        'category_id',
        'img',
        'details',
        'quantity',
        'price',
        'images',
    
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function productImages(){
        return $this->hasMany('App\Models\ProductImages','product_id','id');
    }
    public function reviews(){
        return $this->hasMany('App\Models\Reviews');
    }
    Public function scopeSearched($query){ 
        $search =request()->query('search');
        if(!$search){
            return $query;
        }
        return $query->where('title','LIKE',"%{$search}%");
    }
        

}
