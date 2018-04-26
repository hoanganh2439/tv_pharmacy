<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class token_server extends Model
{
    protected $table = "token_server1";
    protected $primaryKey = 'token_id';
	protected $fillable = ['token_id','token_string','totalpay'];
	public $timestamps = false;
}
