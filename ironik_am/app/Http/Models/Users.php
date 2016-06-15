<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;




class Users extends Model
{

    protected $table = 'users';


    public $timestamps = true;


    public function getAllUsers()
    {


        return DB::table('users')->get();


    }


    /***************************************************** Relationships ***********************************************************/

    /**
     * Relation avec la classe Posts
     * One To Many 1..n
     * le nom de la méthode () doot porter le nom de
     * ma table mis en relation. ( ici post )
     *
     */
//    public function posts()
//    {
//        // namespace + nom de la classe mis en relation
//        return $this->hasMany('App\Http\Models\Posts');
//    }


    public function posts()
    {
        return $this->belongsToMany('App\Http\Models\Posts','users_posts');
    }


    public function comments()
    {

        return $this->hasManyThrough('App\Http\Models\Comments', 'App\Http\Models\Posts');
    }


    /*
     * correspond au systeme like
     * relation n/n avec table intermediaire appellé like.
     * Je fais le choix de la relation BelongToMany. Un users peut "appartenir" à plusieurs like. Et un posts peut "appartenir" à plusieurs like
     * Je réalise donc la relation reciproque sur  modèle posts.
     * Qui peut prendre plusieurs paramètre ( voir doc )
     * Ici le premier paramètre doit être précisé car le nom de ma table ne correspond pas à la convention belongTomany
     * Les autres paramètres sont noramlement facultatif ici ( points de départ => point d'arrivé )
    */


//    public function postlikes()
//    {
//        return $this->belongsToMany('App\Http\Models\Posts', 'likes','users_id','posts_id');
//    }



    public function user_follow()
    {
        return $this->belongsToMany('App\Http\Models\Users', 'user_follow','users_id_1','users_id_2');

    }


    public function user_followed()
    {
        return $this->belongsToMany('App\Http\Models\Users', 'user_follow','users_id_2','users_id_1');

    }

//    public function countsusers() {
//
//
//        return $this->user_followed()
//            ->selectRaw('users_id_2, count(*) as aggregate')
//            ->groupBy('users_id_2');
//    }


    /*
     * partage
     */

//    public function postshare()
//    {
//        return $this->belongsToMany('App\Http\Models\Posts', 'share_post','users_id','posts_id');
//    }
//



      /*->select( DB::raw('COUNT(posts_id_share) as nb'), 'posts_id_share')
            ->groupBy('posts_id_share')
            ->get();

       *
       *
       */




}
