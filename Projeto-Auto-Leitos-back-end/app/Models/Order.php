<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'status',
        'patient_id',
        'sector_id',
        'user_id'
    ];

    protected function casts(){
        return [
            'date_time' => 'datetime'
        ];
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    publiC function user(){
        return $this->belongsTo(User::class);
    }
}
