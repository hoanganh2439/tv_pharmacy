<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\products;
class Category extends Model
{
	protected $table = "categories";
	protected $primaryKey = 'cateid';
	protected $fillable = ['cateid','catename'];
    public $timestamps = false;	
    
   
	public function Products() {
    	return $this->hasMany('App\products','cate_id','proid');
	}
	
}
