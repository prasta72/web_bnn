<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'kerja_praktek_id',
        'admin_id',
        'nilai',
        'keterangan',
    ];
    
    public function admin()
    {
    	return $this->belongsTo('App\Models\Admin');
    }
    public function kerjaPraktek()
    {
    	return $this->belongsTo('App\Models\KerjaPraktek');
    }
}
