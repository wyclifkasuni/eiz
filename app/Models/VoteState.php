<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteState extends Model
{
    use HasFactory;
    public function Vote()
    {
        return $this->belongsTo(Vote::class);
    }
}
