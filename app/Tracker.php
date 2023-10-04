<?php
namespace App;
//use Illuminate\Database\Eloquent\Eloquent;
use Illuminate\Database\Eloquent\Model;
//use Eloquent;

class Tracker extends Model {

    public $attributes = [ 'hits' => 0 ];

    protected $fillable = [ 'ip', 'visit_date' ];
    protected $table = 'icm_tracker';

    public static function boot() {
        // Any time the instance is updated (but not created)
        static::saving( function ($tracker) {
            $tracker->visit_date = date('H:i:s');
            $tracker->hits++;
        } );
    }

    public static function hit() {
        static::firstOrNew([
                  'ip'   => $_SERVER['REMOTE_ADDR'],
                  'visit_date' => date('Y-m-d'),
              ])->save();
    }

}