@extends ('layout')

@section('css')
    @parent
    <link href="{{asset ('css/home.css')}}" rel="stylesheet" >


@endsection


@section('content')





            <!-- ==============================================
          BANDEAU
              =============================================== -->


            <div class="header" style="" >


                <div class="text-center" >
                    <h1 class="title">IroNiQ</h1>

                    <p class="intro">Le réseau social où chariboter en toute tranquillité </p>

                    <a class="btn-lg btn-facebook"><i class="fa fa-facebook"></i> Créer un profil </a>
                    <p class="inscription"> ou <a href="#"> inscrivez-vous </a> avec votre email :) </p>

                </div>
            </div>
            <!-- fin div container fluid -->

            <!-- ==============================================
                      CAROUSEL
                  =============================================== -->




            <div id="perspective" class="hidden-xs">

                <div id="carousel">

                    <figure> <img src="img/1.jpg" /></figure>

                    <figure> <img src="img/2.jpg" /></figure>

                    <figure> <img src="img/3.jpg" /></figure>

                    <figure> <img src="img/1.jpg" /></figure>

                    <figure> <img src="img/2.jpg" /></figure>

                    <figure> <img src="img/3.jpg" /></figure>


                    <figure> <img src="img/1.jpg" /></figure>

                    <figure> <img src="img/2.jpg" /></figure>

                    <figure> <img src="img/3.jpg" /></figure>

                    <figure> <img src="img/1.jpg" /></figure>

                    <figure> <img src="img/2.jpg" /></figure>

                    <figure> <img src="img/3.jpg" /></figure>


                </div>

            </div>


            <!--========================================================================================-->



            <section class="concept">

                <div class="container">

            <!-- ==============================================
                CONCEPT
            =============================================== -->

            <div class="row">

                <div class="col-md-4">

                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <i class="fa fa-smile-o fa-3x"></i>

                        <h3>  CHARIBOTEZ * </h3>
                        <p class="text-muted"> Détourne l'actualité et le quotidien en images.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
                        <i class="fa fa-retweet fa-3x"></i>

                        <h3> PARTAGEZ</h3>
                        <p class="text-muted">Partage tes délires à la communauté IroNiQ et à tes followers. </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="ph-20 feature-box text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
                        <i class="fa fa-star-o fa-3x " ></i>

                        <h3> IRONIQUEZ</h3>
                        <p class="text-muted">Deviens L'IroNiQueR que tout le monde veut suivre</p>
                    </div>
                </div>

            </div>





            <!-- ==============================================
			EN CE MOMENT
    =============================================== -->


            <!--en ce moment version pc -->

            <div class="hidden-xs hidden-sm">



                <div class="barre"></div>


                <h2>EN CE  <span class="beige">MOMENT</span></h2>


                <div class="col-md-12 encemoment">

                    <div class="col-md-2 col-xs-12 color text-center  categorie_moment" style="background-image: url('img/hollande.png');"><h4>Politique</h4></div>

                    @foreach($hotpolitique->posts as $postpolitique)

                    <div class="col-md-3 col-xs-12 col_img_moment"> <img src="{{$postpolitique->image}}" class="img_moment "> </div>

                    @endforeach


                </div>




                <div class="col-md-12 encemoment">


                    @foreach($hotfun->posts as $postfun)

                        <div class="col-md-3 col-xs-12 col_img_moment"> <img src="{{$postfun->image}}" class="img_moment "> </div>

                    @endforeach

                    <div class="col-md-2 col-xs-12 color text-center" style="background-image: url('img/humoukr.png');"><h4>Fun</h4></div>


                </div>

                <div class="col-md-12 encemoment">

                    <div class="col-md-2 col-md-3 col-xs-12 color text-center" style="background-image: url('img/lklklk.png');"><h4>Animaux</h4></div>

                    @foreach($hotanimaux->posts as $postanimaux)

                        <div class="col-md-3 col-xs-12 col_img_moment"> <img src="{{$postanimaux->image}}" class="img_moment "> </div>

                    @endforeach


                </div>

            </div><!--end  en ce moment -->



            <!--en ce moment version mobile et tablette-->

            <div class="visible-xs visible-sm">


                <h2 class="h2_dernierpost">DERNIERS  <span class="beige"> POSTS</span></h2>


                <div class="col-md-12">

                    @foreach($lastpost as $post)

                        <div class="col-xs-10 col-xs-offset-1 col_img_moment_xs"> <img src="{{$post->image}}" class="img_moment img-responsive"> </div>

                    @endforeach


                </div>

            </div>





        </div><!--end container concept+moment-->

    </section>


    <!-- =====================================================================
        Trending Niquer                  Simple code html/css pour aperçu et projeter les animatiosn futurs _ aucune responsivité mobile actuellement
        ====================================================================== -->


    <div class="container-fluid">

        <div class="row top_prof_home " id="top_prof_home">





            <div class="col-md-12">

                <h2 class="text-center">Top Profil</h2>

            </div>


            <div class="col-md-offset-2 col-md-2 col-xs-6">

                <!--pas de foreach poru le premier  à cause du col-md-offset-->
                <article class="text-center">
                    <figure >

                            <a href="{{route('users_index',['id'=>$top_profils[0]->users_followed->id])}}">
                                <img src="{{$top_profils[0]->users_followed->avatar}}" class="img-circle img-rounded profilpic" alt=""/>
                            </a>


                        <figcaption>


                            <h3 class="red-border nom_profil">{{$top_profils[0]->users_followed->username}}</h3>

                        </figcaption>
                    </figure>
                </article>


            </div>


            @foreach($top_profils->splice(1) as $top_profil)

                <div class="col-md-2 col-xs-6">

                    <article class="text-center">
                        <figure>

                            <a href="{{route('users_index',['id'=>$top_profil->users_followed->id])}}">
                                <img src="{{$top_profil->users_followed->avatar}}" class=" img-circle img-rounded profilpic" alt=""/>
                            </a>
                            <figcaption>
                                <h3>{{$top_profil->users_followed->username}}</h3>


                            </figcaption>
                        </figure>
                    </article>

                </div>


            @endforeach









        </div><!-- end row  top profil-->

    </div><!--end container fluid_top_profil-->

    <!--========================== BAndeau TAGCATTOP==============
        =================================================================-->


    <div class="container" id="check_that">

        <div class="row">

            <div class="text-center">

                <h2> CHECK <span class="beige">THAT !</span> </h2>

            </div>
        </div>







        <div class="row" >
            <div class="col-md-12">




                <div class="col-md-6 text-center">


                    <h3> CATEGORIES </h3>

                    @foreach($categories as $categorie)
                    <div class="col-md-4 col-xs-4 col_check_catego">

                        <a href="{{route('categories_index',['id'=>$categorie->id])}}"><img src="{{$categorie->image}}" alt="..." class=" img-responsive"></a>
                    </div>
                    @endforeach


                </div>


                <div class=" col-md-6 text-center">
                <h3> BEST MEME EVER  ! </h3>

                @foreach($best_memes as $best_meme)
                <div class="col-md-4 col-xs-4 col_best_meme">
                    <img src="{{$best_meme->posts->image}}" alt="..." class="img-responsive">
                </div>
                @endforeach


                </div>
                </div>
        </div> <!-- FIN DIV ROW -->





    </div><!--end container bandeau tagcattp-->



@endsection
