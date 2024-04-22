<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality_name',
    ];

    public function Consultant(){
        return $this->hasMany(Speciality::class);
    }
}

