<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'loainguoidung_loai','loainguoidung_ten'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_loainguoidung';

    public function UserAccount(){
        return $this->hasMany('App\Models\UserAccount');
    }
    public function Permission(){
        return $this->hasMany('App\Models\Permission');
    }
}
