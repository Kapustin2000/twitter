<?php namespace App\Traits;

use App\Models\User;

trait HasImages
{
    public function getAvatar(){
        return $this->avatar ? '/storage/profiles/'.$this->avatar : '/images/default-avatar.jpeg';
    }


    public function getBanner(){
        return $this->banner ? '/storage/profiles/'.$this->banner : '/images/default-profile-banner.jpg';
    }
 
}