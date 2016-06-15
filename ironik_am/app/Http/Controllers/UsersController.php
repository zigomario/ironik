<?php

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use App\Http\Models\Users_posts;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User_follow;
use App\Http\Models\Posts;
use App\Http\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{


    public function index($id)
    {


        Auth::user();

        $categories = Categories::all();
        $userprofil = Users::find($id);
        $postsall = Posts::all();


        $postsUserPage = Users_posts::with(['posts.comments' => function ($q) {

            $q->orderBy('id', 'desc');

        }])->where('users_id', '=', $id)->where('likes', '=', null)
            ->orderBy('updated_at', 'desc')->get();


        /*
         * follow button bandeau user
         * Pour check si l'auth follow l'user du profil regardé
         *  */
        $followbandeau = '';
        if(auth::check()) {

            if (User_follow::whereUsersId_1(auth::user()->id)->whereUsersId_2($id)->exists()) {

                $followbandeau = 1;
            }
        }


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
        $sharecount = DB::table('users_posts')
            ->select(DB::raw('COUNT(shares) as nb'), 'posts_id')
            ->where('shares', '=', 1)
            ->groupBy('posts_id')
            ->get();

        $likecount = DB::table('users_posts')
            ->select(DB::raw('COUNT(likes) as nb'), 'posts_id')
            ->where('likes', '=', 1)
            ->groupBy('posts_id')
            ->get();


        /*
        **
        Bandeau stats
        **
        */


        $posts = new Posts();
        $user_follow = new User_follow();

        $getpublic = $posts->getPublication($id);
        $getnbfollower = $user_follow->getnbfollower($id);
        $getNbFollowing = $user_follow->getNbFollowing($id);



        $nblikes = Users_posts::whereHas('posts', function ($q) use ($id){


            $q->where('users_id',$id);

        })->where('likes',1)->count();



        return view('User.user', [


            'categories' => $categories,
            'follow' => $follow,
            'userprofil' => $userprofil,
            'postsall' => $postsall,
            'sharecount' => $sharecount,
            'likecount' => $likecount,
            'getpublic' => $getpublic,
            'getnbfollower' => $getnbfollower,
            'getNbFollowing' => $getNbFollowing,
            'followbandeau' => $followbandeau,
            'postsUserPage' => $postsUserPage,
            'nblikes'=>$nblikes,

        ]);


    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Function pour ajouter des commentaire au clic
    // executé via requête ajax poru eviter un rechargement

    public function commentsplus($last_id, $posts_id)
    {


        $commentsplus = Comments::where('posts_id', $posts_id)
            ->where('id', '<', $last_id)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();


        foreach ($commentsplus as $comment) {


            echo "<div class='commentaires' id='{$comment->id}'>
                                    <p><span class='autor_comment'>{$comment->posts->users->name}:</span> {$comment->contenue}</p>
                                </div>";
        }


    }


}