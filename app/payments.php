<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $table = "payments";
    protected $primaryKey = 'pay_id';
	protected $fillable = ['pay_id','cade_pay','fullname','CVC','totalmoney','limitdate'];
	 public $timestamps = false;	

}
