<?php

namespace App\Http\Controllers;


use App\Http\Requests\MemeRequest;
use App\Http\Models\Posts;
use App\Http\Models\Categories;
use App\Http\Models\Likes;
use App\Http\Models\User_follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mockery\CountValidator\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PhpParser\Builder\FunctionLike;

/**
 * Class MainController
 * @package App\Http\Controllers
 * Sufficé par le mot clef Controller
 * et doit hérité de la super classe Controller
 */
class UserFollowController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }





    /*enregistre , update, les follows*/

    public function follow($idUserMeme)
    {

        if(auth::user()->id == $idUserMeme){


                return Redirect::back()->with('message',"T'as vraiment cru qu'on te laisserait te follow ?? ...connard !!!!!!!" );
        }

        else {


            //withTrashed() permet de prendre toute occurence malgré le sofdeleted
            $existing_like = User_follow::withTrashed()->whereUsersId_1(auth::user()->id)->whereUsersId_2($idUserMeme)->first();

            //
            if ($existing_like === null) {
                User_follow::create([
                    'users_id_1' => auth::user()->id,
                    'users_id_2' => $idUserMeme,
                ]);


            } else {


                //principe du softdeleted :

                if (is_null($existing_like->deleted_at)) {
                    $existing_like->delete();

                } else {
                    $existing_like->restore();

                }
            }


            return Redirect::back();
        }


    }



}


















