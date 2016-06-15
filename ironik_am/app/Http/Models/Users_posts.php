<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class Users_posts extends Model
{

    protected $table = 'users_posts';
    protected $fillable=['users_id','posts_id','shares','likes'];

//    protected $softDelete = true;
//
//    use SoftDeletes;
//
//    protected $dates = ['deleted_at'];


    public $timestamps = true;

    /**
     * retourne toutes les photos
     */
    public function getAllUsers_posts()
    {

        // retourne le resultat de la requete SELECT * FROM categories
        return DB::table('users_posts')->get();


    }


    /***************************************************** Relationships ***********************************************************/


    /*
     * Les deux relations belongTo qui suivent permettent de rentrer dans les tables users et posts via Users_posts
     * avec foreach(users_posts as ligne ) ligne->posts->id / ou / ligne->users->id
     * Si les modèles Posts ou Users ont des fonctions pour leur table liées on peut aussi rentrer dedans
     * Exemple pour commentaires n:1 posts foreach(ligne->posts->comments as comments) comments->id
     * Voir controller pour embarqué dans uen variable le tout.
     */

    public function posts()
    {

        return $this->belongsTo('App\Http\Models\Posts');
    }


    public function users()
    {

        return $this->belongsTo('App\Http\Models\Users');
    }




}
