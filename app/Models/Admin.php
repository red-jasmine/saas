<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use RedJasmine\Support\Contracts\BelongsToOwnerInterface;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Data\UserData;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements JWTSubject, FilamentUser, UserInterface, BelongsToOwnerInterface
{
    public function owner() : UserInterface
    {
        return UserData::from([
            'type' => 'system',
            'id'   => 'system',
        ]);
    }

    public function isAdmin()
    {
        return true;
    }

    public function getType() : string
    {
        return 'admin';
    }

    public function getID() : string
    {
        return $this->getKey();
    }

    public function getNickname() : ?string
    {
        return $this->name;
    }

    public function getAvatar() : ?string
    {
        return $this->avatar;
    }


    use HasRoles;


    public function canAccessPanel(Panel $panel) : bool
    {
        return true;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims() : array
    {
        return [
            'name' => $this->name,
        ];
    }

    protected function casts() : array
    {
        return [
            'password' => 'hashed',
        ];
    }


    use SoftDeletes;

    protected $fillable = [
        'email',
        'password',
        'name'
    ];
}
