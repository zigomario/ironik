<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class User_follow extends Model
{

    protected $table = 'user_follow';
    protected $fillable = ['users_id_1','users_id_2'];
    protected $softDelete = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $timestamps = true;



    public function getAllUser_follow()
    {

        // retourne le resultat de la requete SELECT * FROM categories
        return DB::table('user_follow')->get();


    }


    public function users(){


        return $this->belongsTo('App\Http\Models\Users');

    }


    public function users_followed(){


        return $this->belongsTo('App\Http\Models\Users','users_id_2');

    }

    public function getnbfollower($id){


        $results = User_follow::where('users_id_2',$id)->count();

        return $results;

    }


    public function getNbFollowing($id){



        $results = User_follow::where('users_id_1',$id)->count();

        return $results;
    }



}
