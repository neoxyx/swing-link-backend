<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'image',
        'name',
    ];

    // Relación con el usuario que envió el mensaje
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}