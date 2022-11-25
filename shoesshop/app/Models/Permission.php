<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'quyen_nhaphang', 'quyen_tintuc', 'quyen_donhang', 'quyen_giaohang', 'quyen_nhanvien','loainguoidung_id'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_phanquyen';
}
