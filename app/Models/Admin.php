<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class Admin extends  Authenticatable implements JWTSubject,FilamentUser
{


    use HasRoles;



    public function canAccessPanel(Panel $panel): bool
    {
        return  true;
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims() : array
    {
        return [
            'name'     => $this->name,
        ];
    }

    protected function casts() : array
    {
        return [
            'password'    => 'hashed',
        ];
    }


    use SoftDeletes;

    protected $fillable = [
        'email',
        'password',
        'name'
    ];
}
