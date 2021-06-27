<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];

    public function getColorAttribute(){
        if ($this->type == 'food') {
            return 'warning';
        }elseif ($this->type == 'drink') {
            return 'primary';
        }elseif ($this->type == 'dessert') {
            return 'danger';
        }else{
            return 'dark';
        }
    }

    public function getIdrPercentAttribute(){
        return ($this->ppn / 100) * $this->price;
    }
}
