<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentsRequest;
use App\Http\Models\Posts;
use App\Http\Models\Categories;
use App\Http\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mockery\CountValidator\Exception;

/**
 * Class MainController
 * @package App\Http\Controllers
 * Sufficé par le mot clef Controller
 * et doit hérité de la super classe Controller
 */
class CommentsController extends Controller{



    public function store(CommentsRequest $request, $posts_id)

    {

    Auth::user();




            $comments = new Comments();




        $comments->contenue = $request ->contenue;
        $comments->users_id=auth::user()->id;
        $comments->posts_id=$posts_id;



        $comments->save();


        return Redirect::back();

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
                                    <p><span class='autor_comment'>{$comment->users->username}:</span> {$comment->contenue}</p>
                                </div>";
        }

    }



}


















