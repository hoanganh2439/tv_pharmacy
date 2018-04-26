<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
   	protected $table = "order_detail";
    protected $primaryKey = 'detail_id';
	protected $fillable = ['detail_id','order_id','pro_id','proname','quantity','unit_price'];

    public $timestamps = false;	

    public function order() {
     return $this->belongsTo('App\orders','order_id','orderid');
    }

    public function product() {
     return $this->hasMany('App\products','pro_id','proid');
    }



}
