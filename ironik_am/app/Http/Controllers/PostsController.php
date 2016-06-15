<?php

namespace App\Http\Controllers;


use App\Http\Models\Facebook;
use App\Http\Models\FacebookDebugger;
use App\Http\Models\Share_post;
use App\Http\Models\Users_posts;
use App\Http\Requests\MemeRequest;
use App\Http\Models\Posts;
use App\Http\Models\Categories;
use App\Http\Models\Likes;
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
class PostsController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Page Acceuil
     */
    public function read(){


        $meme = Posts::all();
        $categories = Categories::all();



        return view('MemeGenerator/meme', [

            'meme' => $meme,
            'categories'=>$categories,


        ]);
    }








    /*
     * Function like post
     */






    public function like(MemeRequest $request)
    {
        $posts_id_like=$request->get('posts_id');


        if(Users_posts::whereUsersId( auth::user()->id)->wherePostsId($posts_id_like)->exists()){

                if (Users_posts::whereUsersId( auth::user()->id)->wherePostsId($posts_id_like)->whereShares('1')->exists() ) {


                    Users_posts::where('posts_id', $posts_id_like)->where('users_id', auth::user()->id)->where('shares', 1)->update(['likes' => 1]);
                }

        }else{

            Users_posts::create([

                'users_id'=>auth::user()->id,
                'posts_id'=>$posts_id_like,
                'likes'=> 1,
            ]);


        }

        $test= DB::table('users_posts')
            ->select( DB::raw('COUNT(shares) as nb'))
            ->where('shares', '=', 1)
            ->groupBy('shares')
            ->get();

        $test=Users_posts::where('likes',1)->where('posts_id',$posts_id_like)->get();




        echo $test->count();



    }



    /*
     * Fonction partage
     *
     *
     */

    public function share(MemeRequest $request)
    {

        $posts_id_share=$request->get('posts_id');



        if (Users_posts::whereUsersId( auth::user()->id)->wherePostsId ($posts_id_share)->exists() ){


            if (Users_posts::whereUsersId( auth::user()->id)->wherePostsId($posts_id_share)->whereLikes('1')->exists() ) {


                Users_posts::where('posts_id', $posts_id_share)->where('users_id', auth::user()->id)->where('likes', 1)->update(['shares' => 1]);
            }




        }else{

            Users_posts::create([

                'users_id'=>Auth::user()->id,
                'posts_id'=>$posts_id_share,
                'shares'=> 1,
            ]);


        }

//        $test= DB::table('users_posts')
//            ->select( DB::raw('COUNT(shares) as nb'))
//            ->where('shares', '=', 1)
//            ->groupBy('shares')
//            ->get();

        $test=Users_posts::where('shares',1)->where('posts_id',$posts_id_share)->get();




        echo $test->count();

    }








    /*******
     *********enregistrement meme
     ************/




    public function store(MemeRequest $request, $id =null)

    {


        $user= $request->get('user');
        $categories_id=$request->get('categories_id');

        if(!empty($id)){

            $meme = Posts::find($id);

        }else{



            $meme = new Posts();


        }



        $meme->users_id=$user;
        $meme->categories_id=$categories_id;


        $data = $request->get('image');

        if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
            $imageType = $matches[1];
            $imageData = base64_decode($matches[2]);
            $image = imagecreatefromstring($imageData);
            $filename = md5($imageData) . '.png';

            if (imagepng($image, 'uploads/photos/' . $filename)) {
                echo json_encode(array('filename' => '/uploads/photos/' . $filename));
                $meme->image = asset("uploads/photos/". $filename);
            } else {
                throw new Exception('Could not save the file.');
            }
        } else {
            throw new Exception('Invalid data URL.');
        }




        $meme->save();


        // on enregistrer le liens ur table intermedaire
        // Se fait après la création du new posts car on aura besoin du dernier id de Posts pour users_posts

        $users_posts = new Users_posts();

        $users_posts->users_id = $user;
        $users_posts->posts_id = $meme->id;

        $users_posts->save();



        return Redirect::route('home_index');

    }






    public function reload(MemeRequest $request){


        $url = 'http://ironiq.adrididi.fr/';
        $fb = new FacebookDebugger();

        $fb->clear_open_graph_cache($url);




    }


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


















