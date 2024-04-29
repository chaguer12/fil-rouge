<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'const_id',
        'status'

    ];

    protected $table = ['post'];


    public function consultant(){
        return $this->belongsTo(Consultant::class);
    }

}
