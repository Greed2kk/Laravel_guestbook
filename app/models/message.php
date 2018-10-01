<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
class message extends Model
{
    //
    protected $table='messages';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'message'];
    
    // created_at || createdAt === getCreatedA
    public function getCreatedAtAttribute($date) {
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i:s / d.m.y');
    }
}
