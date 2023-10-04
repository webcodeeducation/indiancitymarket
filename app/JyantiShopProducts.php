<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\JyantiShops;

class JyantiShopProducts extends Model
{
   protected $table = 'icm_jyanti_shop_products';

   /*public function shops() {
    return $this->belongsTo('JyantiShops', 'id');
  }*/
}