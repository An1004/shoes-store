<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'gia_ban', 'sanpham_id', 'size_id'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_gia';

    public function Product(){
        return $this->belongsTo('App\Models\Product','sanpham_id');
    }
    public function Size(){
        return $this->belongsTo('App\Models\Size','size_id');
    }
}
