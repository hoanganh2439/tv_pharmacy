<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table = "images";
    protected $primaryKey = 'imgid';
	protected $fillable = ['img_name','pro_id'];
    public $timestamps = false;	
    public function product(){
    	return $this->belongsTo('App\products','pro_id','proid');
    }
}
