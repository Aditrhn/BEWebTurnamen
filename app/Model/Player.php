<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Player extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'address', 'contact', 'ava_url'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = \true;

    public function getAvatar()
    {
        return !$this->ava_url ? asset('images/avatar/default.png') : $this->ava_url;
    }
}
