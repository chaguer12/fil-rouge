<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
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
}
