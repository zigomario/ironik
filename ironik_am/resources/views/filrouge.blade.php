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
            <h2>Fil rouge</h2>
            <p>Merci de mettre vos retour en commentaire du post_ Il faut être login pour que ça fonctionne  </p>

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
                                <h4 style="color:red">Problematique et bug connu</h4>
                                <ul>
                                    <li>Option dessin sur image ne fonctionne pas</li>
                                    <li>Partage facebook et image qui bug parfois</li>
                                    <li>"mon espace" non implementé</li>
                                    <li>Si une catégorie renvoie une erreur => encore aucun post dedans</li>
                                    <li>chargemeent parfois très long</li>
                                    <li> partage twitter sans image</li>
                                    <li>partage instagramme non implementé</li>
                                    <li>loader anim à la création d'un meme -><span style="color:red" >fixed</span></li>
                                    <li>Faire disparaitre le login quand log</li>
                                    <li>Ergo sidebar / sa scrollbar / pseudo decalage, </li>
                                    <li>Redirection ou message après création meme</li>
                                    <li>Titre du meme->-><span style="color:red" >fixed (supprimé)</span> </li>
                                    <li>bouton création ( sur sidebar pour les auth )</li>
                                    <li>zone de texte des commentaires sans mise en forme</li>
                                    <li>Différentes css et aperçu image - voir Backplash)</li>

                                </ul>

                            </div>

                            <div class="panel-footer">



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
                                <div class="panel-meme-textarea">

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
