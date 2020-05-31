<?php

namespace App\Models;

use App\Traits\LikeAble;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['body'];

    use LikeAble;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
