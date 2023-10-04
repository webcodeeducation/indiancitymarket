<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class BookService extends Model
{
   protected $table = 'icm_book_services';
   protected $fillable = ['service_id', 'full_name', 'email','mobile','home_phone','address_primary','address_secondry','street','postalcode','state','city','message'];
}