<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['user_id', 'pizza_id', 'quantity', 'order_id'];
    public $timestamps = false;
}
