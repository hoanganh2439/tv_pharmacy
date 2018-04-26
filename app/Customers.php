<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Customers as Authenticatable;
class Customers extends Model
{
    protected $table = "customers";
	protected $primaryKey = 'cusid';
	protected $fillable = ['cusid','fullname','email','gender','password','dateofbirth','address','phonenumber'];
    public $timestamps = false;	

    public function orderCus(){
     	$this->hasMany('App\orders','cus_id','orderid');
    }
}
