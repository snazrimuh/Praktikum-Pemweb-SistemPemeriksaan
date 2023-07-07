<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Gate;


class User extends Authenticatable
{
    use Notifiable;

    // ...

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];
    
    // public function isUser()
    // {
    //     return $this->role === 'admin';
    // }

}
