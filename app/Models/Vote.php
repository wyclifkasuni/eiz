<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'aspirant_id'
    ];
    public function VoteState()
    {
        return $this->hasOne(VoteState::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Aspirant()
    {
        return $this->belongsTo(Aspirant::class);
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
