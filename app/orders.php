<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = "orders";
    protected $primaryKey = 'orderid';
	protected $fillable = ['orderid','cus_id','totalprice','token_string','dateimportorder'];
	
    
    public function orderdetail(){
     	$this->hasMany('App\orderdetail','order_id','detail_id');
    }

    public function customer() {
     return $this->belongsTo('App\Customers','cus_id','cusid');
    }
}
