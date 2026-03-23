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

    protected $hidden = [

    ];

    protected function casts() : array
    {
        return [

        ];
    }

    //Relacionamentos
    public function bed(){
        return $this->hasOne(Bed::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
