@extends('layout')

@section('title')

   User_Page

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
        $(".comment_plus").click(function(){


            var thisbutton = (this)
            var last_id = $(this).closest(".panel-meme").find(".commentaires:last").attr("id");
            var posts_id = $(this).attr("value");



            $.ajax({

                url:'/comments/commentsplus/'+last_id+'/'+posts_id ,


                success: function(html){

                    if(html) {

                        $(thisbutton).closest(".panel-meme").find(".content_commentaires").append(html);
                    }

                }



            });


        });

    </script>

    @endsection



    @section('content')



            <!-- ==============================================
BANDEAU
    =============================================== -->

    <!--================ -- BOUTON Follow =====================-->

    @if(Auth::check())
        @if(Auth::user()->id != $userprofil->id)
            <form enctype="multipart/form-data"  method="POST" role="form" class="form-inline" action="{{ route('follow_user', ['idUserMeme'=>$userprofil->id ] ) }}">
                {!! csrf_field() !!}
                <div class="btn_follow">

                        @if($followbandeau == 1)  <button type="submit" class="btn btn-danger"><i class="fa fa-user-times  btnplus_follow"></i> </button> </i>
                        @else  <button type="submit" class="btn btn-warning"><i class="fa fa-user-plus btnplus_follow"></i> </button>  </i>
                        @endif


                </div>
            </form>
        @endif
    @endif
    <div style="color:red; font-size:20px; text-align: center">{{Session::get('message')}} </div>

    @include('Partial/_bloc_infostat_user')

    <div>




    </div>






    <!-- ==============================================
MEME
=============================================== -->



    <!--je recupère de l'array de la catégorie courante , tout les posts -->






            <div class="container">


                @foreach($postsUserPage as $usersposts)



                    <div class="row"  >


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

                                <!--condition pour recuperer l'id de l'auteur original dans le cas où ce serait un post share ou like -->




                        <div class="panel-meme col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 " id="{{$usersposts->id}}">
                            @if(isset($usersposts->shares) || isset($usersposts->likes))<div class="panel_share">{{$usersposts->users->username}} a partagé ou like le post de :</div>@endif
                            <div class="panel-heading" id="{{$usersposts->posts->id}}">
                                <a href="{{route('users_index', ['id' => $idAuteur ]) }}"><img class=" img-circle img-responsive pull-left"
                                                                                                  src="{{$avatarAuteur}}" alt=""/></a><!--je peux traverser la table users car je la lie dans ma requête controlleur : posts.users-->
                                <p>  {{$usernameAuteur}}/{{$usersposts->posts->id}} </p>
                                <p> {{date('d M, H\hi',strtotime($usersposts->updated_at))}}</p>





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
                                    <img  src="{{$usersposts->posts->image}}" class="img_post"   />

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
                                {{--<div>--}}
                                    {{--<a href="http://twitter.com/share" class="twitter-share-button"--}}
                                       {{--data-url="http://ironiq.adrididi.fr/"--}}

                                       {{--data-lang="fr">Tweeter</a>--}}
                                {{--</div>--}}

                                <!--SHARE FACEBOOK -->

                                {{--<div class="fb-share-button"  data-href="http://ironiq.adrididi.fr" data-layout="button_count" data-mobile-iframe="true"> </div>--}}
                                {{--<button type="button" class="plopin"></button>--}}
                                {{--<button type="button" class="testimg">imgtest</button>--}}
                                {{--<div class="testajax"></div>--}}
                                {{--<a href="https://graph.facebook.com?id=http://ironiq.adrididi.fr&scrape=true&access_token=1583810988597192|a47f46e96dce60895cf7a1d04eafc3d5">testdiretc</a>--}}
                                {{--<a class="sanssdk" href=""><img src="https://www.techrevolutions.fr/wp-content/plugins/social-media-widget/images/default/32/facebook.png" alt="Facebook share"></a>--}}




                                <!----------------
                                              suivre-------------------->
                                <!--condition où selon si auth ou pas, et si auth-follow auteur-->

                                <form enctype="multipart/form-data"  method="POST" role="form" class="form-inline" action="{{ route('follow_user', ['idUserMeme'=>$usersposts->users->id ] ) }}">
                                    {!! csrf_field() !!}
                                    @if(Auth::check())
                                        @if(in_array($usersposts->users->id,$follow)==0 && $idAuteur != Auth::user()->id )

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
