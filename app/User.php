<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','adresse','mobile','logo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


        /*public function setPasswordAttribute($password)
        {
            $this->attributes['password'] = bcrypt($password);
        }*/

    public function projets()
    {
        return $this->hasMany('App\Projet');
    }

    public function taches()
    {
        return $this->hasMany('App\Tache');
    }


    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function Department()
    {
        return $this->hasOne('App\Department');
    }


    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee ');
    }







}
