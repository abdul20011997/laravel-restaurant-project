<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodmenu extends Model
{
    use HasFactory;
    public function foodmenu()
    {
        return $this->hasOne('App\Models\Cart','product_id');
    }
}
