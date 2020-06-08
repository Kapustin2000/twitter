<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    protected $fillable = ['user_id', 'profile_user_id', 'created_at'];
    
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'traffic',
            'user_id',
            'profile_user_id'
        );
    }
}
