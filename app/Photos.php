<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Users;

class Photos extends Model
{
   protected $table = 'icm_photos';

    public function user()
    {
        return $this->belongsTo( Users::class );
    }
}