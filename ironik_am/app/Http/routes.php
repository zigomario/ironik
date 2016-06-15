<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * PAGE STATIQUE
 *
 */


Route::get('/test',function () {

    return view('test');
});

Route::get('home', array('as' => 'home', 'uses' => function(){
    return view('home');
}));

/*
 *
 *
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

    Route::auth();


    /*page acceuil*/

    Route::get('/',  [
        'as' => 'home_index',
        'uses' => 'HomeController@index'
    ]);



    /*
     * social test
     */




        Route::get('auth/twitter', 'Auth\AuthController@redirectToProvider');
        Route::get('auth/twitter/callback', 'Auth\AuthController@handleProviderCallback');



    Route::get('auth/facebook', 'Auth\AuthController@redirectToProviderFacebook');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallbackFacebook');


//    $s = 'social.';
//    Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
//    Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);


//    Route::get('/auth/twitter', [
//        'as' => 'twitter',
//        'uses' => 'Auth\AuthController@redirectToProvider'
//    ]);


    /*creation de meme*/


    Route::group(['prefix' => 'meme'], function () {


        Route::get('/meme', [
            'as' => 'meme_read',
            'uses' => 'PostsController@read'
        ]);

        Route::post('/store/{id?}', [
            'as' => 'meme_store',
            'uses' => 'PostsController@store'
        ])->where('id','\d+');

        Route::post('/cache', [
            'as' => 'meme_cache',
            'uses' => 'PostsController@cache'
        ]);



    });



    /*fonction like post*/


    Route::get('/posts/isLikedbyme/{id}',[

        'as'=>'check_like',
        'uses'=>'PostsController@isLikedByMe'
    ])->where('id','\d+');


//
    Route::post('/posts/like', 'PostsController@like');



    route::get('/post/commentsplus/{last_id}/{posts_id}',

        ['as'=>'post_commentsplus',
            'uses'=>'PostsController@commentsplus'

        ])->where(['last_id'=>'\d+','posts_id'=>'\d+' ]);

    /*fonction partage*/

    Route::post('/posts/share', 'PostsController@share');

//    Route::post('/share_post/test',[
//
//        'as'=>'share_post',
//        'uses'=>'PostsController@sharetest'
//    ]);


    /*fonction refresh facebook*/

    Route::post('/posts/reload', 'PostsController@reload');


    /*function follow user*/

    Route::post('/user_follow/follow/{idUserMeme}',[

        'as'=>'follow_user',
        'uses'=>'UserFollowController@follow'
    ])->where('id','\d+');


    /*Formulaire  profil */



    Route::get('/profil-setting/read',
        ['as' => 'profil_setting_index',
            'uses'=>'ProfilSettingController@index'
        ]);

    Route::post('/profil-setting/store',
        ['as' => 'profil_setting_store',
            'uses'=>'ProfilSettingController@store'
        ])->where('id','\d+');



    /*
     *  Pages CATEGORIES
     *
     */


    Route::get('/categories/{id}',[

        'as'=>'categories_index',
        'uses'=>'CategoriesController@index'
    ])->where('id','\d+');

    route::get('/categories/commentsplus/{last_id}/{posts_id}',

        ['as'=>'categories_commentsplus',
         'uses'=>'CategoriesController@commentsplus'

        ])->where(['last_id'=>'\d+','posts_id'=>'\d+' ]);


    /*
     * Pahe Newsfeeds
     */

    Route::get('/newsfeed/{id}',[

        'as'=>'newsfeed_index',
        'uses'=>'NewsfeedController@index'
    ])->where('id','\d+');

    route::get('/newsfeed/commentsplus/{last_id}/{posts_id}',

        ['as'=>'newsfeed_commentsplus',
            'uses'=>'NewsfeedController@commentsplus'

        ])->where(['last_id'=>'\d+','posts_id'=>'\d+' ]);


    /*
     * Pages Comments
     */



    Route::post('/comments/store/{posts_id}',
        ['as' => 'comments_store',
            'uses'=>'CommentsController@store'
        ])->where(['posts_id'=> '\d+']);

    route::get('/comments/commentsplus/{last_id}/{posts_id}',

        ['as'=>'comments_commentsplus',
            'uses'=>'CommentsController@commentsplus'

        ])->where(['last_id'=>'\d+','posts_id'=>'\d+' ]);


    /*
     *Pages  USER
     *
     */



    Route::get('/users/{id}',[

        'as'=>'users_index',
        'uses'=>'UsersController@index'
    ])->where('id','\d+');


    /*Pages User Private*/


    Route::get('/userprivate', [

        'as' => 'user_private_read',
        'uses' => 'UserPrivateController@read'
    ]);



    /*fil rouge
    */

    Route::get('/filrouge', [

        'as' => 'fil_rouge',
        'uses' => 'FilrougeController@index'
    ]);




});
