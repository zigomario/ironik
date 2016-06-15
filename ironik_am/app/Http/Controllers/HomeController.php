<?php

namespace App\Http\Controllers;

use App\Http\Models\Likes;
use App\Http\Models\Posts;
use App\Http\Models\User_follow;
use App\Http\Models\Users;
use App\Http\Models\Users_posts;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{



    public function index()
    {


        Auth::user();


        $categories = Categories::all();


        /*
         * En ce moment requetes
         */


        $hotpolitique = Categories::with(['posts'=>function($q){

            $q->orderBy('updated_at', 'desc')->take(3);

        }])->find('1');


        $hotfun = Categories::with(['posts'=>function($q){

            $q->orderBy('updated_at', 'desc')->take(3);

        }])->find('2');

        $hotanimaux = Categories::with(['posts'=>function($q){

            $q->orderBy('updated_at', 'desc')->take(3);

        }])->find('3');

        /*
         * Last post ( pour view xs )
         */

        $lastpost = Posts::orderBy('updated_at','desc')->take(4)->get();


        /*
         * Top profil
         */



        $top_profils = User_follow::with('users.users_followed')
            ->selectRaw(('users_id_2, count(*) as aggregate'))
            ->groupBy('users_id_2')
            ->orderBy('aggregate')
            ->get();

        $best_memes = Users_posts::with('posts')
            ->selectRaw('posts_id, SUM(likes) as aggregate ')
            ->groupBy('posts_id')
            ->orderBy('aggregate','desc')->take(9)
            ->get();



        return view('Home.index',[

            'categories'=>$categories,
            'hotpolitique'=>$hotpolitique,
            'hotfun'=>$hotfun,
            'hotanimaux'=>$hotanimaux,
            'top_profils'=> $top_profils,
            'best_memes'=>$best_memes,
            'lastpost'=>$lastpost,


        ]);
    }
}
