<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class VendorOrders extends Model
{
   protected $table = 'vendorsorders';

      function showOrders(){
   		return $this->hasMany('App\User', 'user_id', 'id');
   }
}