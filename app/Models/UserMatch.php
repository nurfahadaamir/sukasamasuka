<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMatch extends Model
{
    use HasFactory;

    protected $fillable = ['matcher_id', 'matched_id', 'status'];

    // Relationship with Users
    public function matcherUser()
    {
        return $this->belongsTo(User::class, 'matcher_id');
    }

    public function matchedUser()
    {
        return $this->belongsTo(User::class, 'matched_id');
    }
}
