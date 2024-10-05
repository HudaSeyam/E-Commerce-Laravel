<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reviews extends Model
{
    protected $table="reviews";
    
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'text',
    ];

    public function product(){
        
        return $this->belongsTo('App\Models\ProductImages','product_id','id');

    }
    public function user(){
        
        return $this->belongsTo('App\User','user_id','id');

    }

}

