<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirant extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id','user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function Votes(){
        return $this->hasMany(Vote::class);
    }
}
