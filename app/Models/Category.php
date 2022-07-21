<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','description',
    ];

public function Aspirant(){
    return $this->hasOne(Aspirant::class);
}

public function Votes(){
    return $this->hasMany(Vote::class);
}

}
