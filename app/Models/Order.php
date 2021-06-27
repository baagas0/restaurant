<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'waiter_id',
        'table_number',
        'customer_name',
        'amount',
        'status',
    ];
    
    public function list(){
        return $this->hasMany('App\Models\MenuOrder','order_id','id');
    }
    public function transaction(){
        return $this->hasMany('App\Models\Transaction','order_id','id');
    }

    // public function list(){
    //     return $this->hasMany('App\Models\MenuOrder','order_id','id')->where('status', '0');
    // }

    // public function addOn(){
    //     return $this->hasMany('App\Models\MenuOrder','order_id','id')->where('status', '1');
    // }
}
