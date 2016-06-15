<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Share_post extends Model
{

    protected $table = 'share_post';
    protected $fillable = ['users_id','posts_id'];

    public $timestamps = false;


    public function getAllShare()
    {

        // retourne le resultat de la requete SELECT * FROM categories
        return DB::table('share_post')->get();


    }

    /*function pour mettre en lien posts et like , et ainsi permettre alors le retour count like via post */

//    public function posts(){
//
//
//        return $this->belongsTo('App\Http\Models\Posts');
//
//    }










}
