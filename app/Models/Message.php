<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table  = 'messages_sent';
    protected $fillable = [
        'message_type',
        'phone','hmis'
    ];
}
