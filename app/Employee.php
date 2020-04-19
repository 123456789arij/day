<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $guard = 'employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','role','sex','skills','image','adresse','date_inscription','id_department',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public function department()
    {
        return $this->hasOne('App\Department');
    }


    public function projets()
    {
        return $this->belongsToMany('App\Projet');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }




}
