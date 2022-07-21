<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',
        'user_id',
        'gender',
        'dob',
        'phone',
        'address',
        'bio',
        'profile'
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
