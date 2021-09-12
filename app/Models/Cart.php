<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
class Cart extends Model
{
    use HasFactory;
    public $table='cart';
    public function cart()
    {
        return $this->belongsTo('App\Models\Foodmenu','product_id');
    }


}
