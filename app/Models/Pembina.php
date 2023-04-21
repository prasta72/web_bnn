<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'alamat',
        'no_hp',
        'bidang_kerja',
        'status',
    ];
    public function admin()
    {
    	return $this->belongsTo('App\Models\Admin');
    }
    public function kerjapraktek()
    {
    	return $this->hasOne('App\Models\kerjaPraktek');
    }
}
