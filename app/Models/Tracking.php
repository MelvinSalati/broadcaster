<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;
    protected $table    = 'tracking';
    protected $fillable = ['comments','appointment_id','recipient_uuid','date_tracked','time_tracked'];
}
