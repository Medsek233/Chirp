<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Chirp extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Comment::class);
    }
}
