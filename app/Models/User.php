<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use RedJasmine\Support\Domain\Contracts\UserInterface;


class User extends Authenticatable implements HasName,UserInterface,FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getUserData() : array
    {
        return [
            'type'     => $this->getType(),
            'id'       => $this->getID(),
            'nickname' => $this->getNickname(),
            'avatar'   => $this->getAvatar(),
        ];
    }


    public function canAccessPanel(Panel $panel) : bool
    {
        return  true;
    }

    public function getFilamentName() : string
    {
        return  $this->username;
    }

    public function getType() : string
    {
        return 'user';
    }

    public function getID() : string
    {
        return $this->getKey();
    }

    public function getNickname() : ?string
    {
        return $this->nickname;
    }

    public function getAvatar() : ?string
    {
        return  $this->avatar;
    }

}
