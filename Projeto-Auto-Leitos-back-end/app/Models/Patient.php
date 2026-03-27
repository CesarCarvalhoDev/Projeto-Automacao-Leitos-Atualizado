<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf'
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [];
    }

    protected static function booted()
    {
        static::creating(function ($patient) {
            if ($patient->bed_id) {
                $bed = \App\Models\Bed::find($patient->bed_id);

                if ($bed->status === 'MAINTENANCE') {
                    throw new \Exception('Leito em manutenção');
                }
            }
        });
    }

    //Relacionamentos
    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
