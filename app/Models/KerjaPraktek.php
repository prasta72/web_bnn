<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjaPraktek extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pembina_id',
        'NIM',
        'alamat',
        'no_hp',
        'instansi',
        'jurusan',
        'status',
        'bidang_kerja',
        'mulai_kerja_praktek',
        'selesai_kerja_praktek',
    ];
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
    public function pembina() 
    {
    	return $this->belongsTo('App\Models\Pembina');
    }
    public function absensi()
    {
    	return $this->hasOne('App\Models\Absensi');
    }
    public function nilai()
    {
    	return $this->hasOne('App\Models\Nilai');
    }
}
