<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['tweet','user_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
