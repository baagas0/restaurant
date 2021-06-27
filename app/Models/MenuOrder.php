<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_id',
        'order_amount',
        'amount',
        'serve_at',
        'status',
    ];

    public function menu(){
        return $this->belongsTo('App\Models\Menu','menu_id','id');
    }
}
