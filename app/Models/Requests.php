<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_send',
        'user_id_received',
        'accepted',
    ];

    // Relación con el usuario que envió la solicitud
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_send');
    }

    // Relación con el usuario que recibe la solicitud
    public function received()
    {
        return $this->belongsTo(User::class, 'user_id_received');
    }
}