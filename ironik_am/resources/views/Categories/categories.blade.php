@extends('layout')


@section('title')

    Categories

@endsection



@section('css')
    @parent

    <link href="{{asset ('css/bloc_meme.css')}}" rel="stylesheet">


    <style>
        .header_categories{

        background-color: #f1d783;
        }

        .header_categories h2 {

        margin:0;

        }
    </style>


@endsection


@section('js')
        @parent



@endsection



    @section('content')





            <!-- ==============================================
BANDEAU
    =============================================== -->


    <div class="header_categories">
        <div class="text-center">
            <h2>{{$postsByCategorie[0]->posts->categories->title}} </h2>

        </div>
    </div>

        @if(Auth::guest())
        <div class=" menu_categorie "  >


            @foreach($categories as $categorie)

            <div class="col-md-4 col-sm-10 hidden-xs col_categorie_sidebar">
            <a href="{{route('categories_index', ['id'=>$categorie->id])}}"><img src="{{$categorie->image}}" alt="..." class="img-responsive"></a>
            </div>
            @endforeach
        </div>
        @endif





    <!-- ==============================================
    MEME
    =============================================== -->



    <div class="container">
        @foreach($postsByCategorie as $users_posts)

        <div class="row"  >
            <!--je recupère de l'array de la catégorie courante , tout les posts -->
            {{--<div class="col-md-3">--}}
                {{--<div class=" menu_categories " id="blbl" >--}}


                    {{--@foreach($categories as $categorie)--}}

                        {{--<div class="col_test_cate col_categorie_sidebar">--}}
                            {{--<a href="{{route('categories_index', ['id'=>$categorie->id])}}"><img src="{{$categorie->image}}" alt="..." class="img-responsive"></a>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                    {{--</div>--}}

            {{--</div>--}}





            <div class="panel-meme col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 " id="{{$users_posts->id}}">



                        <div class="panel-meme col-md-12">
                            <div class="panel-heading" id="{{$users_posts->posts->id}}">
                               <a href="{{route('users_index', ['id' => $users_posts->users->id ]) }}"><img class=" img-circle img-responsive pull-left" src="{{$users_posts->posts->id}}" alt=""/></a><!--je peux traverser la table users car je la lie dans ma requête controlleur : posts.users-->
                                <p> {{$users_posts->users->username}} / {{$users_posts->posts->id}}</p>
                                <h5> {{$users_posts->posts->created_at}}</h5>



                                <div class="btn-group more-actions">
                                    <button type="button" class="btn btn-default dropdown-toggle btn_Option" data-toggle="dropdown" >
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Partager = embed (code forum)</a></li>
                                        <li><a href="#">Report this post</a></li>

                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="thumbnail ">  <!-- IMAGE -->
                                    <img src="{{$users_posts->posts->image}}"  class="img_post"  />
                                </div>

                            </div>

                            <div class="panel-footer">

                                <button type="button"  class="btn btn-default like_button" value="{{$users_posts->posts->id}}" >
                                    <span class="like_button_value">
                                          @foreach($likecount as $like)@if($like->posts_id == $users_posts->posts->id){{$like->nb}}@endif @endforeach
                                    </span>
                                    <i class="fa fa-heart"> </i>
                                </button>

                                <button type="button" class="btn btn-default share_button" value="{{$users_posts->posts->id}}">
                                    <span class="share_button_value">
                                        @foreach($sharecount as $share)@if($share->posts_id == $users_posts->posts->id){{$share->nb}}@endif @endforeach
                                    </span>
                                    <span class=" glyphicon glyphicon-share-alt"></span>
                                </button>


                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> Partager</button>


                                <ul class="dropdown-menu dropdown-menu-right"  >
                                    <li>
                                        <a class="btn btn-facebook fb_share "  title="On facebook" href="#"><i
                                                    class="fa fa-facebook fa-lg tw "></i></a>

                                    </li>
                                    <li>
                                        <a class="twitter-share-button"   title="On Twitter" href="http://twitter.com/share">

                                            <i class="fa fa-twitter fa-lg tw" style="color:#2A96DE" ></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-instagram" target="_blank"
                                           title="On Instagram Plus" href="#"><i class="fa fa-instagram fa-lg-instagram"></i>
                                        </a>
                                    </li>


                                </ul>

                                    <!----------------
                                            suivre-------------------->
                                <!--condition où selon si auth ou pas, et si auth-follow auteur-->


                                    <form enctype="multipart/form-data"  method="POST" role="form" class="form-inline" action="{{ route('follow_user', ['idUserMeme'=>$users_posts->users->id ] ) }}">
                                       {!! csrf_field() !!}



                                    @if(Auth::check())
                                            @if(in_array($users_posts->users->id,$follow)==0 && $users_posts->users->id != Auth::user()->id )

                                                <button type="submit" class="btn btn-warning" >
                                                    <i class="fa fa-user-plus">Suivre </i>

                                                </button>

                                            @endif
                                    @else

                                        <button type="submit" class="btn btn-warning" >
                                            <i class="fa fa-user-plus">Suivre </i>

                                        </button>

                                    @endif




                                    </form>
                                    <div style="color:red">{{Session::get('message')}} </div>


                        <!--COMMENTAIRES-->
                                <ul class="comments-container">
                                    <div id="ember1541" class="ember-view"><div data-ember-action="1542" class="comments-pagination ">
                                          <span class="pagination-text">
                                            <a href="" class="comment-count">

                                                        {{count($users_posts->posts->comments)}} commentaires

                                            </a>
                                          </span>
                                        </div>

                                    </div>
                                </ul>

                                <div class="input-placeholder"> Commenter</div>
                            </div>



                            <div class="panel-meme-comment">
                                <img class="img-circle" src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s46" alt="User Image" />
                                <div class="panel-meme-textarea">pour ?

                                    <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST"
                                          action="{{ route('comments_store',['posts_id'=>$users_posts->posts->id])}}">


                                        {!! csrf_field() !!}
                                        <textarea class="form-control comments_textarea" name="contenue" rows="2"></textarea>
                                        <button type="submit" class="[ btn btn-warning disabled ]">Poster un commentaire</button>
                                        <button type="reset" class="[ btn btn-default ]"> Annuler</button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>

                                <div class="content_commentaires">

                                    @foreach($users_posts->posts->comments->take(2) as $comment)

                                            <div class="commentaires" id="{{$comment->id}}">
                                                <p>  </p>

                                                <p><span class="autor_comment">{{$comment->users->username}}</span> {{$comment->contenue}}</p>
                                            </div>

                                    @endforeach



                                </div>
                                <button type="button" class="comment_plus" value="{{$users_posts->posts->id}}">++</button>

                            </div>

                        </div>

            </div>



        </div><!--end row general-->

        @endforeach

    </div>



@endsection
