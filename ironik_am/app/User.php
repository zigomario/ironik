<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','username','city','naissance','genre','twitter_id','avatar'
    ];



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = true;

    public function getAllUsers(){

        // retourne le resultat de la requete SELECT * FROM categories
        return DB::table('users')->get();

    }







}
