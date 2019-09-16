<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
  protected $fillable = ['display_name', 'email', 'created_at', 'address', 'phone_number'];
  public $timestamps = false;
}
