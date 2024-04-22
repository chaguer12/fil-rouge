<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends User
{
    use HasFactory;

    protected $with = [
        'User',
    ];

    protected $fillable =[
        'user_id',
];
    public function User(){
        return $this->belongsTo(User::class);

    }

    public function consultant() {
        return $this->belongsTo(Consultant::class);
    }

    public function speciality() {
        return $this->belongsTo(Speciality::class);
    }

    public function Image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
