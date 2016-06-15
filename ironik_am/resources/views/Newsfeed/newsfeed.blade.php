@extends('layout')

@section('title')

    NewsFeed

@endsection

@section('css')
    @parent
    <link href="{{asset ('css/user.css')}}" rel="stylesheet" >
    <link href="{{asset ('css/bloc_infostat_user.css')}}" rel="stylesheet" >
    <link href="{{asset ('css/bloc_meme.css')}}" rel="stylesheet" >
@endsection



@section('js')
        @parent


        <script type="text/javascript">       //PENSER A METHODISER POUR CHAQUE PAGE




        </script>

@endsection



    @section('content')



            <!-- ==============================================
BANDEAU
    =============================================== -->

        <!--================ -- BOUTON Follow =====================-->

        <div style="color:red; font-size:20px; text-align: center">{{Session::get('message')}} </div>

        @include('Partial/_bloc_infostat_user')

        <div>




        </div>




                <!-- ==============================================
    MEME
    =============================================== -->






    <div class="container">


        @foreach($postsnewsfeed as $usersposts)



            <div class="row"  >



                <!--condition pour recuperer l'id de l'auteur original dans le cas où ce serait un post share ou like -->
                <?php $idAuteur='';
                $avatarAuteur='';
                $usernameAuteur='';?>

                @if(is_null($usersposts->shares)&& is_null($usersposts->likes))
                    <?php
                    $idAuteur=$usersposts->users->id;
                    $avatarAuteur=$usersposts->users->avatar;
                    $usernameAuteur=$usersposts->users->username;
                    ?>

                @else
                    <?php
                    $idAuteur=$usersposts->posts->user->id;
                    $avatarAuteur=$usersposts->posts->user->avatar;
                    $usernameAuteur=$usersposts->posts->user->username;
                    ?>
                @endif



            <div class="panel-meme col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 " id="">
                @if(isset($usersposts->shares) || isset($usersposts->likes))<div>{{$usersposts->users->username}} a partagé ou like</div>@endif
                <div class="panel-heading" id="{{$usersposts->posts->id}}">
                    <a href="{{route('users_index', ['id' => $idAuteur ]) }}"><img class=" img-circle img-responsive pull-left"
                                          src="{{$avatarAuteur}}" alt=""/></a><!--je peux traverser la table users car je la lie dans ma requête controlleur : posts.users-->
                    <p>  {{$usernameAuteur}}/{{$usersposts->posts->id}} </p>
                    <p>A crée le {{$usersposts->updated_at}}</p>





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
                        <img src="{{$usersposts->posts->image}}" class="img_post"  />
                    </div>

                </div>

                <div class="panel-footer">

                    <button type="button"  class="btn btn-default like_button" value="{{$usersposts->posts->id}}" >
                        <span class="like_button_value">
                              @foreach($likecount as $like)@if($like->posts_id == $usersposts->posts->id){{$like->nb}}@endif @endforeach
                        </span>
                        <i class="fa fa-heart"> </i>
                    </button>



                    <button type="button" class="btn btn-default share_button" value="{{$usersposts->posts->id}}">
                        <span class="share_button_value">
                            @foreach($sharecount as $share)@if($share->posts_id == $usersposts->posts->id){{$share->nb}}@endif @endforeach
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


                    <form enctype="multipart/form-data"  method="POST" role="form" class="form-inline" action="{{ route('follow_user', ['idUserMeme'=>$usersposts->users->id ] ) }}">
                        {!! csrf_field() !!}


                        @if(Auth::check())
                            @if(in_array($usersposts->users->id,$follow)==0 && $usersposts->users->id != Auth::user()->id )

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

                                    {{count($usersposts->posts->comments)}} commentaires

                                </a>
                              </span>
                            </div>

                        </div>
                    </ul>

                    <div class="input-placeholder"> Commenter</div>
                </div>



                <div class="panel-meme-comment">
                    <img class="img-circle" src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s46" alt="User Image" />
                    <div class="panel-meme-textarea">

                        <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST"
                              action="{{ route('comments_store',['posts_id'=>$usersposts->posts->id ])}}">


                            {!! csrf_field() !!}
                            <textarea class="form-control comments_textarea" name="contenue" rows="2"></textarea>
                            <button type="submit" class="[ btn btn-warning disabled ]">Poster un commentaire</button>
                            <button type="reset" class="[ btn btn-default ]"> Annuler</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>

                    <div class="content_commentaires">


                        @foreach($usersposts->posts->comments->take(2) as $comment)

                            <div class="commentaires" id="{{$comment->id}}">
                                <p>  </p>

                                <p><span class="autor_comment">{{$comment->users->username}}</span> {{$comment->contenue}}</p>
                            </div>

                        @endforeach



                    </div>
                    <button type="button" class="comment_plus" value="{{$usersposts->posts->id}}">++</button>

                </div>

            </div>
        </div>


        @endforeach

    </div>

@endsection
