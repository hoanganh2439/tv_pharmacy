<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\products;
class mades extends Model
{
  	protected $table = "mades";
  	protected $primaryKey = 'madeid';
	protected $fillable = ['madename'];
    public $timestamps = false;	
    public function product(){
    	$this->hasMany('App\products','made_id','proid');
    }
}
