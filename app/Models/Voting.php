<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'votings';
    use HasFactory;
    protected $fillable = [
        'like',
        'dislike',
        'user_id',
        'feedback_id',
    ];
}
