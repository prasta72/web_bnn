<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kerjapraktek_id',
        'waktu',
        'kehadiran',
        'status',
    ];

    protected $dates = ['waktu'];

    public function kerjapraktek()
    {
    	return $this->belongsTo('App\Models\KerjaPraktek');
    }
}
