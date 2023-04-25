<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bidang_kerja',
        'waktu',
        'kegiatan',
        'status',
    ];
    public function user() 
    {
    	return $this->belongsTo('App\Models\User');
    }
}
