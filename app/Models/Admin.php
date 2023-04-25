<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable 
{
    use HasFactory;
    protected $guarded = [];
    public function pembina()
    {
    	return $this->hasOne('App\Models\Pembina');
    }
    public function nilai()
    { 
    	return $this->hasOne('App\Models\Nilai');
    }
}
