<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'diachi_ten','diachi_macdinh','khachhang_id'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_diachi';

   
    public function Customer(){
        return $this->belongsTo('App\Models\Customer','khachhang_id');
    }
   
}