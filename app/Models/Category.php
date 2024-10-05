<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;
    protected $table="category";
    protected $date=['deleted_at'];
    
    protected $fillable = [
        'title',
        'img',
    ];
    public function product(){
        return $this->hasMany('App\Models\Product','category_id','id');
    }
    Public function scopeSearched($query){ 
        $search =request()->query('search');
        if(!$search){
            return $query;
        }
        return $query->where('title','LIKE',"%{$search}%");
    }
}
