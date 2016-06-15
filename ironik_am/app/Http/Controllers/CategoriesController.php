<?php

namespace App\Http\Controllers;

use App\Http\Models\Comments;
use App\Http\Models\User_follow;
use App\Http\Models\Users_posts;
use App\Http\Requests;
use App\Http\Models\Categories;
use App\Http\Models\Posts;
use App\Http\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{



    public function index($id)
    {

        Auth::user();
        $categories = Categories::all();




    /*
     * En litteral : Tu prends le modèles Users_posts ( et donc sa table )
     * où sa methode 'posts' ( qui lie au modèle et table correspondant ) filtre sur table.colonne
     * Et tu rajoute la methode comments du modèle posts ( ic possible car lien entre Users_posts et posts via la relation écrite  dans le modèle Users_posts )
     * (!!!attention l'écriture 'posts.comments' ne correspond pas à : 'modèle.methode'.
     * C'est methode.methode !!!!!!!!!!!!!)
     *
     */
        $postsByCategorie=Users_posts::whereHas('posts',function($q) use ($id){

            $q->where('posts.categories_id', $id);

        }) ->with(['posts.comments' => function ($q) {

            $q->orderBy('id', 'desc');

        }


        ])->where('shares','=',null)->where('likes','=',null)
            ->orderBy('updated_at', 'desc')->get();





    /*
     * si Auth, on push dans array chaque personne qu'il follow
     *
     */
        $follow=[];
        if(auth::check()) {
            $followed = User_follow::where('users_id_1', auth::user()->id)->get();
           foreach($followed as $followe){

               $follow[]=$followe->users_id_2;
           }
        }

     /*
      * Compteur de like et de share
      */
        $sharecount= DB::table('users_posts')
            ->select( DB::raw('COUNT(shares) as nb'), 'posts_id')
            ->where('shares', '=', 1)
            ->groupBy('posts_id')
            ->get();

        $likecount= DB::table('users_posts')
            ->select( DB::raw('COUNT(likes) as nb'), 'posts_id')
            ->where('likes', '=', 1)
            ->groupBy('posts_id')
            ->get();






        return view('Categories.categories', [

            'postsByCategorie'=> $postsByCategorie,
            'categories'=>$categories,
            'follow'=>$follow,
            'likecount'=>$likecount,
            'sharecount'=>$sharecount,


        ]);


    }

//////////////////////////////////////////////////////////////////////////////////////////////

    /*
     * Fonction commentaire ++ executée en ajax
     * Cette fois connection directement sur la table commentaire car on dispose des paramètres necessaires
     */

    public function commentsplus($last_id, $posts_id){



        $commentsplus= Comments::where('posts_id',$posts_id )
                            ->where('id','<', $last_id)
                            ->orderBy('id', 'desc')
                            ->take(3)
                            ->get();




        foreach($commentsplus as $comment){


            echo  "<div class='commentaires' id='{$comment->id}'>
                                    <p><span class='autor_comment'>{$comment->users->name}:</span> {$comment->contenue}</p>
                                </div>";
        }

    }














}
