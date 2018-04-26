<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\products;
use app\mades;
class products extends Model
{
    protected $table = "products";
    protected $primaryKey = 'proid';
	protected $fillable = ['proid','proname','price','description','quanlity','user_id','cate_id','made_id'];

    public $timestamps = false;	

    
    public function category() {
     return $this->belongsTo('App\Category','cate_id','cateid');
    }

   
     public function made(){
     	return $this->belongsTo('App\mades','made_id','madeid');
     }

    public function images(){
     	$this->hasMany('App\images','pro_id','imgid');
    }
    public function orderdetailcus(){
        $this->belongsTo('App\orderdetail','pro_id','detail_id');
    }
    
}
