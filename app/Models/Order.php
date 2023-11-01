<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }


    public function user(){
        return $this->belongsTo(user::class);
    }
}
