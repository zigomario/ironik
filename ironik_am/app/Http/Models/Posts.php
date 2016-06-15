<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Posts extends Model
{

    protected $table = 'posts';
    protected  $fillable =['users_id','title','image','categories_id','share','posts_id_share'];


    public $timestamps = true;




    /***************************************************** Relationships ***********************************************************/

    public function getAllPost()
    {

        return DB::table('posts')->get();


    }


    /**
     * Retourne la catégorie à laquelle appartient un objet Memes
     * Many To One : n..1.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo('App\Http\Models\Categories');
    }

    /*
     * lien users n:n posts pour table users_posts
     */

    public function users()
    {

       return $this->belongsToMany('App\Http\Models\Users','users_posts');

   }

    /*
     * lien user 1:n post  pour atteindre info d'un post lorsque partagé ou like
     */

    public function user() {

        return $this->belongsTo('App\Http\Models\Users','users_id');

    }


    public function comments(){

        return $this->hasMany('App\Http\Models\Comments');
    }



//    /* voir modèle users*/
//
//    public function userLike()
//    {
//        return $this->belongsToMany('App\Http\Models\Users', 'likes', 'posts_id','users_id');
//    }
//
//
//    /*
//     * ici c'est une relation secondaire pour mettre un lien direct entre Tables posts et likes, et réaliser ainsi un count sur like, à partir de post
//     */
//
//    public function likes()
//    {
//
//        return $this->hasMany('App\Http\Models\likes');
//    }



    /*partage de post*/
//
//    public function userShare()
//    {
//        return $this->belongsToMany('App\Http\Models\Users', 'share_post', 'posts_id','users_id');
//    }
//
//    public function share_post()
//    {
//
//        return $this->hasMany('App\Http\Models\share_post');
//    }


//    public function posts_share()
//    {
//        // namespace + nom de la classe mis en relation
//        return $this->belongsTo('App\Http\Models\Posts','posts_id_share');
//    }

//
//    public function post_share_hasmany_post_id()
////    {
////        // namespace + nom de la classe mis en relation
////        return $this->hasMany('App\Http\Models\Posts','posts_id_share');
////    }





    public function getPublication($id)
    {

        $results = DB::table('posts')
            ->select(DB::raw('COUNT(id) as nbpublie'))
            ->where('users_id', $id)
            ->first();

        return $results;
    }


}
