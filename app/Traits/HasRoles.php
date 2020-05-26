<?php namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function abilities()
    {
        return $this->roles()->map->abilities->flatten();
    }
 
}