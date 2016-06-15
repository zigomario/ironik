<?php

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use App\Http\Models\Users;
use App\Http\Requests;
use App\User;


class UserPrivateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {



        $categories = Categories::all();
        $usernewsfeed= Users::find(11);

        return view('User/user_private', [


            'categories' =>  $categories,
            'usernewsfeed'=> $usernewsfeed,

        ]);


    }
}
