<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\JyantiShopProducts;

class JyantiShops extends Model
{
   protected $table = 'icm_geeta_jyanti_shops';

   public function products() {
    return $this->hasMany('JyantiShopProducts', 'shop_id');
  }
}